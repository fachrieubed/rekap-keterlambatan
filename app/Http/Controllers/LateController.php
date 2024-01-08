<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Exports\LatesExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
// use PDF;

class LateController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('ps')) {
            $rayon = $user->rayon;

            if ($rayon) {
                $students = Student::where('rayon_id', $rayon->id)->pluck('name');
                $lates = Late::whereIn('name', $students)->get();
            } else {
                return redirect()->route('home')->with('error', 'You are not assigned to any rayon.');
            }
        } else {
            $lates = Late::all();
            $students = Student::all();
        }

        $rekapitulasi = $lates->groupBy('name')->map(function ($group) {
            return [
                'id' => $group->first()->id,
                'name' => $group->first()->name,
                'jumlah_keterlambatan' => $group->count(),
            ];
        });

        return view('lates.show', compact('lates', 'rekapitulasi', 'students'));
    }

    public function create()
    {
        $siswas = Student::all();
        $students = Student::all();
        return view('lates.create', compact('siswas', 'students'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'date_time_late' => 'required|date',
            'information' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('images'), $imageName);

        Late::create([
            'name' => $request->name,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $imageName,
        ]);

        return redirect()->route('data.keterlambatan.page')->with('success', 'Data Keterlambatan added successfully.');
    }


    public function edit(Late $late)
    {
        return view('lates.edit', compact('late'));
    }

    public function update(Request $request, Late $late)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_time_late' => 'required|date',
            'information' => 'required|string',
            'bukti' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $imageName = time() . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('images'), $imageName);
            $late->update(['bukti' => $imageName]);
        }

        $late->update([
            'name' => $request->name,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
        ]);

        return redirect()->route('data.keterlambatan.page')->with('success', 'Data Keterlambatan updated successfully.');
    }

    public function destroy(Late $late)
    {
        $late->delete();
        return redirect()->route('data.keterlambatan.page')->with('success', 'Data Keterlambatan deleted successfully.');
    }

    public function detail($id)
    {
        $late = Late::where('name', $id)->get();

        if ($late->isEmpty()) {
            return redirect()->route('data.keterlambatan.page')->with('error', 'Data Keterlambatan tidak ditemukan.');
        }

        return view('lates.detail', compact('late'));
    }

    public function cetakSurat($id)
    {
        // Retrieve the data or generate the content for the letter based on $id
        $late = Late::find($id);

        if (!$late) {
            abort(404); // Handle the case where the late entry is not found
        }

        // Get additional data from the students table based on the name
        $studentData = Student::select('nis', 'name', 'rombel_id', 'rayon_id')
        ->where('name', $late->name)
            ->first();

        // Get the aggregated data for rekapitulasi
        $rekapitulasi = Late::where('name', $late->name)->count();

        // Pass the late data, additional student data, and jumlah_keterlambatan to the Blade view
        $data = [
            'late' => $late,
            'studentData' => $studentData,
            'jumlah_keterlambatan' => $rekapitulasi,
        ];

        $pdf = Pdf::loadview('letters.surat_pernyataan', $data);
        return $pdf->download('laporan.pdf');
    }

    public function export()
    {
        // Retrieve the data or generate the content for the export
        $latesData = Late::groupBy('name')
        ->selectRaw('name, COUNT(*) as jumlah_keterlambatan')
        ->with(['student' => function ($query) {
            $query->select('name', 'nis', 'rombel_id', 'rayon_id');
        }])
            ->get();

        // Export data to Excel using Laravel Excel
        return Excel::download(new LatesExport($latesData), 'rekap_keterlambatan.xlsx');
    }
}
