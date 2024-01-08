@extends('layout.app')

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
      <div>
          <div class="btn-wrapper">
              <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
          </div>
      </div>
  </div>
  <div class="tab-content tab-content-basic">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
      <div class="row">
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                  <div>
                    <h4 class="card-title card-title-dash">Pending Requests</h4>
                    <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                  </div>
                  <div>
                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i
                        class="mdi mdi-account-plus"></i>Add new member</button>
                  </div>
                </div>
                <div class="table-responsive  mt-1">
                  <table class="table select-table">
                    <thead>
                      <tr>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
