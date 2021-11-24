<div class="row" id="table-gsm">


<div class="col-md-6">
        <div class="card card-stats ">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                                <i class='fas fa-exclamation-circle faa-ring animated fa-3x'><span class="badge badge-danger">{{$gsm_no_assign->count()}}</span></i>
                        </div>
                        <div class="col-5">
                             <button type="button" class="btn btn-danger float-left mr-2" data-toggle="modal" data-target="#importData"">
                            <b>GSM no assign</b>
                            </button>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                        </div>
                    </div>
                </div>
            </div>
    </div>


       <div class="col-md-6">
        <div class="card card-stats ">

            <div class="card-body">
                <h6>Status GSM</h6>
                <table class="table table-hover data " class="table_home" id="table_home" >

                <tr>
                     <th scope="col" class="list" style="text-align: center">Status GSM</th>
                    <th scope="col" class="list" style="text-align: center">Total Status GSM</th>
                </tr>




                    <tr>
                             <td style="text-align: center">
                        {{ $status[1]->status_gsm}}

                            </td>

                         <td style="text-align: center">
                            {{$status[1]->jumlah_status_gsm}}
                         </td>



                    </tr>

                    <tr>
                             <td style="text-align: center">
                        {{ $status[0]->status_gsm}}

                            </td>

                         <td style="text-align: center">
                            {{$status[0]->jumlah_status_gsm}}
                         </td>



                    </tr>

                    <tr>
                             <td style="text-align: center; color:red" >
                        {{ $status[2]->status_gsm}}

                            </td>

                         <td style="text-align: center; color:red">
                            {{$status[2]->jumlah_status_gsm}}
                         </td>



                    </tr>



                </table>
            </div>
        </div>
       </div>
</div>
  <!-- Modal Import -->
  <div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
		<div class="modal-dialog-full-width modal-dialog" style="width: 1000px; height: 1000px;"" role="document">
			<div class="modal-content-full-width modal-content">
				<div class="modal-header-full-width modal-header bg-primary">
					{{-- <h6 class="modal-title">Import data</h6> --}}
					<button type="button" class="close" id="close-modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
          <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                 <div class="card-body">
                {{-- <h6>Sensor</h6> --}}
                <table class="table table-responsive data " class="table_home" id="table_home" >

                <tr>
                <th scope="col" class="list">Status GSM*</th>
                <th scope="col" class="list-gsmNumber">GSM Number*</th>
                <th scope="col" class="list-company">Company*</th>
                <th scope="col" class="list">Serial Number*</th>
                <th scope="col" class="list">ICC ID</th>
                <th scope="col" class="list">IMSI</th>
                <th scope="col" class="list">Res ID</th>
                <th scope="col" class="list">Request Date</th>
                <th scope="col" class="list">Expired Date</th>
                <th scope="col" class="list">Active Date</th>
                <th scope="col" class="list">Terminated Date</th>
                <th scope="col" class="list">Note</th>
                <th scope="col" class="list">Provider</th>
                {{-- <th scope="col" class="sticky-col first-col">Action</th> --}}
              </tr>
              @foreach ($GsmMaster as $item )
                        <tr {{ $item->was_maintenance === "1" ? 'style=background-color:#e8837d' : ""  }}>


                            <td>
                                {{ $item->status_gsm }}
                            </td>
                            <td>
                                {{ $item->gsm_number }}
                            </td>
                            <td >
                                {{ $item->company->company_name??''}}
                            </td>
                            <td>
                                {{ $item->serial_number }}
                            </td>
                            <td>
                                {{ $item->icc_id }}
                            </td>
                            <td>
                                {{ $item->imsi }}
                            </td>
                            <td>
                                {{ $item->res_id }}
                            </td>
                            <td>
                                {{ $item->request_date }}
                            </td>
                            <td>
                                {{ $item->expired_date }}
                            </td>
                            <td>
                                {{ $item->active_date }}
                            </td>
                            <td>
                                {{ $item->terminate_date }}
                            </td>
                            <td>
                                {{ $item->note }}
                            </td>
                            <td>
                                {{ $item->provider }}
                            </td>

                        @endforeach
                    </tr>
                </table>
            </div>
            </div>
          </div>
        </div>
        <div class="modal-footer-full-width  modal-footer">

        </div>
        </div>
			</div>
		</div>
	</div>

</div>

<script>


        // ---- Close Modal -------
    $('#close-modal').click(function() {
        // deleteTemporary();
          $('#importData').modal('hide');
    });

</script>
{{-- <h1>hello word</h1> --}}
