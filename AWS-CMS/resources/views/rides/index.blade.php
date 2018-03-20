@extends('layouts.admin')
@section('extra_assets')
<style type="text/css">
.close {display: none;
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--begin::Add-Member-Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                        Ride List
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="customerSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                                <i class="la la-search"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                            <a href="{{ route('ride_create') }}" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-car"></i>
                                    <span>
                                        New Ride
                                    </span>
                                </span>
                            </a>
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-responsive" id="html_table" width="100%">
                    <theadt class="head-default">
                        <tr>
                            <th> ID </th>
                            <th> Customer </th>
                            <th> Driver </th>
                            <th> Vehicle Number </th>
                            <th> Source </th>
                            <th> Destination </th>
                            <th> Start Date </th>
                            <th> End Date </th>
                            <th> Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rides_list as $ride)
                        <tr>
                            <td> {{$ride->id}} </td>
                            <td><a href="{{ route('ride_profile', ['ride'=>$ride->id]) }}">
                                {{$ride->customer->f_name}} {{$ride->customer->l_name}}
                            </a></td>
                            <td> {{$ride->driver->f_name}} {{$ride->driver->l_name}}</td>
                            <td> {{$ride->vehicle->vehicle_no}} </td>
                            <td> {{$ride->source}} </td>
                            <td> {{$ride->destination}}  </td>
                            <td> {{$ride->from->format('d M Y')}} </td>
                            <td> {{$ride->till->format('d M Y')}} </td>
                            @if(in_array("$ride->status", ["Scheduled"], TRUE))
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-primary dropdown-toggle m-btn--pill" id="{{$ride->id}}_current_status" type="button" data-toggle="dropdown" aria-expanded="false"> {{$ride->status}}
                                    
                                    </button>
                                    <ul id="{{$ride->id}}_current_ul" class="dropdown-menu" role="menu">
                                        <li>
                                            <a id="Ongoing_{{$ride->id}}" onclick="setStatus('Ongoing',{{$ride->id}})" href="javascript:;">
                                            <i class="icon-add"></i> Ongoing </a>
                                        </li>
                                        <li>
                                            <a id="Completed_{{$ride->id}}" onclick="setStatus('Completed',{{$ride->id}})"  href="javascript:;" >
                                            <i class="icon-add"></i> Completed </a>
                                        </li>
                                        <li>
                                            <a id="Cancelled_{{$ride->id}}" onclick="setStatus('Cancelled',{{$ride->id}})" href="javascript:;">
                                            <i class="icon-add"></i> Cancelled </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            @elseif(in_array("$ride->status", ["Completed"], TRUE))
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-success m-btn--pill" id="{{$ride->id}}_current_status" type="button"> {{$ride->status}}
                                    
                                    </button>
                                </div>
                            </td>
                            @elseif(in_array("$ride->status", ["Ongoing"], TRUE))
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-warning dropdown-toggle m-btn--pill" id="{{$ride->id}}_current_status" type="button" data-toggle="dropdown" aria-expanded="false"> {{$ride->status}}
                                    
                                    </button>
                                    <ul id="{{$ride->id}}_current_ul" class="dropdown-menu" role="menu">
                                        <li>
                                            <a id="Scheduled_{{$ride->id}}" onclick="setStatus('Scheduled',{{$ride->id}})" href="javascript:;">
                                            <i class="icon-add"></i> Scheduled </a>
                                        </li>
                                        <li>
                                            <a id="Completed_{{$ride->id}}" onclick="setStatus('Completed',{{$ride->id}})"  href="javascript:;" >
                                            <i class="icon-add"></i> Completed </a>
                                        </li>
                                        <li>
                                            <a id="Cancelled_{{$ride->id}}" onclick="setStatus('Cancelled',{{$ride->id}})" href="javascript:;">
                                            <i class="icon-add"></i> Cancelled </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            @elseif(in_array("$ride->status", ["Cancelled"], TRUE))
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-danger m-btn--pill" id="{{$ride->id}}_current_status" type="button"> {{$ride->status}}
                                    
                                    </button>
                                </div>
                            </td>
                            @endif
                        </tr>
                        <div class="modal fade" id="m_modal_{{$ride->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <input type="hidden" name="modalRideID" value="{{$ride->id}}">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-3">
                                                    <label class="radio-inline" >
                                                        <input  type="radio" name="fare" onchange="checkBoxChange('km', {{$ride->id}})" value="Kilometers" id="km_{{$ride->id}}" checked/> Kilometers
                                                    </label>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-3">
                                                    <label class="radio-inline" style="text-align: right;">
                                                        <input type="radio" name="fare" onchange="checkBoxChange('hr', {{$ride->id}})" value="Hours" id="hr_{{$ride->id}}"> Hours
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="KMDiv_{{$ride->id}}" class="form-group ">
                                                <input id="KMInput_{{$ride->id}}" type="number" onkeyup="onModalInputKeyUP('km', {{$ride->id}})" class="form-control m-input m-input--solid" id="recipient-name" placeholder=" Enter Kilometers">
                                            </div>
                                            <div id="HRDiv_{{$ride->id}}" class="form-group m--hide">
                                                
                                                <input type="number" id="HRInput_{{$ride->id}}" onkeyup="onModalInputKeyUP('hr', {{$ride->id}})" class="form-control m-input m-input--solid" id="message-number" placeholder="Enter Hours">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer"  style="text-align: center;" >
                                        <button id="rideComplete_{{$ride->id}}" style="text-align: center;" onclick="rideCompleteDetail({{$ride->id}})" type="button" class="btn btn-primary" disabled="disabled">
                                        Complete Ride
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra_js')
<script src="{{asset('assets/default/demo/default/custom/components/datatables/base/customer-table.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
function setStatus(newStatus, id) {
var oldStatus =  (document.getElementById(id+'_current_status').innerText);
oldStatus.replace(/&#?[a-z0-9]+;/i, "");
console.log('old status is:'+oldStatus);
// document.getElementById("field2").value = document.getElementById("field1").value;
// alert(status +' '+ id);
console.log("ID is"+id);
$.post('/ride/'+id+'/set_status', {
        _token: $('meta[name=csrf-token]').attr('content'),
        status: newStatus             
})
.done(function(new_status) {
        console.log('new status is:'+new_status);
        document.getElementById(id+'_current_status').innerText = new_status;
        if (new_status === "Ongoing") {

            document.getElementById(id+'_current_status').className = "btn btn-xs btn-warning dropdown-toggle m-btn--pill";
            updateOptions(oldStatus, id, new_status+'_'+id);
            toastr.remove();
            toastr.warning('Ride Ongoing', 'Ride status changed');

        }
        if(new_status === "Scheduled"){
            document.getElementById(id+'_current_status').className = "btn btn-xs btn-primary dropdown-toggle m-btn--pill";
            updateOptions(oldStatus, id, new_status+'_'+id);
            toastr.remove();
            toastr.success('Ride Scheduled' , 'Ride status changed');

        }
        if(new_status === "Cancelled"){
            document.getElementById(id+'_current_status').className = "btn btn-xs btn-danger m-btn--pill";
            $('#'+id+'_current_status').removeClass('dropdown-toggle');
            $('#'+id+'_current_ul').remove();
            toastr.remove();
            toastr.error('Ride Cancelled!' , 'Ride status changed');

        }
        if(new_status === "Completed"){
            document.getElementById(id+'_current_status').className = "btn btn-xs btn-success m-btn--pill";
            $('#'+id+'_current_status').removeClass('dropdown-toggle');
            $('#'+id+'_current_ul').remove();

            //$('#m_modal_'+id).modal({backdrop: 'static', keyboard: false});
            //$('#m_modal_'+id).modal('show');
            ///$('#km_'+id).prop('checked', true);
            //$('#KMInput_'+id).val('');
            $//('#HRInput_'+id).val('');
            $('#rideComplete_'+id).attr('disabled', 'disabled');
            toastr.remove();
            toastr.success('Ride Completed', 'Success');

        }
})
.fail(function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });
}
//this function replaces id,text,onclick property of selected li with old li
function updateOptions(oldStatus, id, new_status){
    var new_status_li = document.getElementById(new_status);
    @if(isset($ride->id))
        if(oldStatus.includes('Scheduled')){
            new_status_li.innerHTML = "<i class='icon-add'></i> Scheduled";
            new_status_li.setAttribute('onclick',"setStatus('Scheduled',"+id+")");
            new_status_li.id = 'Scheduled_'+id;
        }
        if(oldStatus.includes('Ongoing')){
            new_status_li.innerHTML = "<i class='icon-add'></i> Ongoing";
            new_status_li.setAttribute('onclick',"setStatus('Ongoing',"+id+")");
            new_status_li.id = 'Ongoing_'+id;
        }
    @endif
}
</script>
<script type="text/javascript">
    
    function checkBoxChange(type, id){
        console.log(type + id);
        if(type == 'km'){
            if($('#km_'+id).is(":checked")){
                $('#KMDiv_'+id).removeClass('m--hide');
                $('#HRDiv_'+id).addClass('m--hide');
                $('#HRInput_'+id).val('');
                if($.isNumeric($('#KMInput_'+id).val()) && $('#KMInput_'+id).val() > 1 ){
                        $('#rideComplete_'+id).attr('disabled', null);
                } else {
                    $('#rideComplete_'+id).attr('disabled', 'disabled');
                }                
            }
        }
        if(type == 'hr'){
            if($('#hr_'+id).is(":checked")){
                $('#HRDiv_'+id).removeClass('m--hide');
                $('#KMDiv_'+id).addClass('m--hide');
                $('#KMInput_'+id).val('');
                if($.isNumeric($('#HRInput_'+id).val()) && $('#HRInput_'+id).val() > 1 ){
                        $('#rideComplete_'+id).attr('disabled', null);
                } else {
                    $('#rideComplete_'+id).attr('disabled', 'disabled');
                }                
            }            
        }
    }

</script>
<script type="text/javascript">
    
  function onModalInputKeyUP(type, id){
        console.log('inputchanges');

        if(type == 'km'){

                if($.isNumeric($('#KMInput_'+id).val()) && $('#KMInput_'+id).val() > 1 ){
                        $('#rideComplete_'+id).attr('disabled', null);
                } else {
                    $('#rideComplete_'+id).attr('disabled', 'disabled');
                }                
        
        }
        if(type == 'hr'){

                if($.isNumeric($('#HRInput_'+id).val()) && $('#HRInput_'+id).val() > 1 ){
                        $('#rideComplete_'+id).attr('disabled', null);
                } else {
                    $('#rideComplete_'+id).attr('disabled', 'disabled');
                }                            
        }

    }
</script>

<script type="text/javascript">
    
    function rideCompleteDetail(id){

        $.post('/ride/'+id+'/update_run_details', {
            _token: $('meta[name=csrf-token]').attr('content'),
            KM: $('#KMInput_'+id).val(),
            HR: $('#HRInput_'+id).val()             
        }).done(function(data){

            toastr.success('Ride Completed', 'Success');
            $('#m_modal_'+id).modal('hide');

        }).fail(function(xhr, textStatus, errorThrown) {
                alert(xhr.responseText);
        });

    }
</script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL SCRIPTS -->
@endsection
