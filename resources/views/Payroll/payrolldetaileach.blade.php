@include('layouts.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.navbar')
  @include('layouts.menubar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{'ID: PAPA-'. sprintf("%05d",$payroll_detail->employee->id) .' Name: '.  $payroll_detail->employee->first_name . ' ' . $payroll_detail->employee->last_name }}
 
        {{-- {{ $employee->first_name .' ' . $employee->last_name .' ID: PAPA'. $employee->id}} --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/employee"> Employees</a></li>
        <li class="active">Payslip</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h4>Payroll No.{{ $payroll_detail->id }}</h4>
            </div>
              <div class="box-body">
              <form method="POST" action="/payroll_detail_each_edit/{{ $payroll_detail->id }}">
                @csrf
                @method('PUT')
              <div class="form-group col-md-12">
                <div class="row">
                <div class=" col">
                  <label for="basic_pay" class="col-sm-2 control-label">Basic Pay</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="basic_pay" name="basic_pay" value="{{ $payroll_detail->basic_pay }}" >
                  </div>
              </div>
              <div class=" col">
                  <label for="day_work" class="col-sm-2 control-label">Days Work</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="day_work" name="day_work" value="{{ $payroll_detail->days_work }}" >
                  </div>
              </div>
            </div> <br>
                
                <div class="row">
                  <div class=" col">
                    <label for="overtime_hour" class="col-sm-2 control-label">Overtime Hours</label>
  
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="overtime_hour" name="overtime_hour" value="{{ $payroll_detail->overtime_hour }}" >
                    </div>
                </div>
                <div class=" col">
                    <label for="annual_leave" class="col-sm-2 control-label">Annual Leave</label>
  
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="annual_leave" name="annual_leave" value="{{ $payroll_detail->annual_leave }}" >
                    </div>
                </div>
              </div> <br>
            
              <div class="row">
                <div class=" col">
                  <label for="educate" class="col-sm-2 control-label">Education Allowance</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="educate" name="educate" value="{{ $payroll_detail->education_allowance }}" >
                  </div>
              </div>
              <div class=" col">
                  <label for="unpaid_leave" class="col-sm-2 control-label">Unpaid Leave</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="unpaid_leave" name="unpaid_leave" value="{{ $payroll_detail->unpaid_leave }}" >
                  </div>
              </div>
            </div> <br>
          
            <div class="row">
              <div class=" col">
                <label for="transport" class="col-sm-2 control-label">Transport Allowance</label>

                <div class="col-sm-4">
                  <input type="text" class="form-control" id="transport" name="transport" value="{{ $payroll_detail->transport_allowance }}" >
                </div>
            </div>
            <div class=" col">
                <label for="damage" class="col-sm-2 control-label">Property Damage</label>

                <div class="col-sm-4">
                  <input type="text" class="form-control" id="property_damage" name="damage" value="{{ $payroll_detail->property_damage }}" >
                </div>
            </div>
          </div> <br>
        
          <div class="row">
            <div class=" col">
              <label for="overtime" class="col-sm-2 control-label">Overtime Allowance</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="overtime" name="overtime" value="{{ $payroll_detail->overtime_allowance }}" >
              </div>
          </div>
          <div class=" col">
              <label for="loan" class="col-sm-2 control-label">Loan</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="loan" name="loan" value="{{ $payroll_detail->loan }}" >
              </div>
          </div>
        </div><br>

        <div class="row">
          <div class=" col">
            <label for="food" class="col-sm-2 control-label">Food Allowance</label>

            <div class="col-sm-4">
              <input type="text" class="form-control" id="food" name="food" value="{{ $payroll_detail->food_allowance }}" >
            </div>
        </div>
        <div class=" col">
            <label for="tax" class="col-sm-2 control-label">Tax</label>

            <div class="col-sm-4">
              <input type="text" class="form-control" id="tax" name="tax" value="{{ $payroll_detail->tax }}" >
            </div>
        </div>
      </div><br>

      <div class="row">
        <div class=" col">
          <label for="total_earn" class="col-sm-2 control-label">Total Earning</label>

          <div class="col-sm-4">
            <input type="text" class="form-control" id="total_earn" name="total_earn" value="{{ $payroll_detail->total_earning }}" >
          </div>
      </div>
      <div class=" col">
          <label for="deduction" class="col-sm-2 control-label">Total Deduction</label>

          <div class="col-sm-4">
            <input type="text" class="form-control" id="deduction" name="deduction" value="{{ $payroll_detail->total_deduction }}" >
          </div>
      </div>
    </div><br>
    <div class="row">
    <div class=" col">
        <label for="net_pay" class="col-sm-2 control-label">Total Net Pay</label>

        <div class="col-sm-4">
          <input type="text" class="form-control" id="net_pay" name="net_pay" >
        </div>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-success btn-md">Save Change</button>

    </div>
  </div>
              
              {{-- <button data-id="{{ $employee->id }}" data-target="#addnew" data-toggle="modal" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> New</button> --}}
            
          </div>
        </form>
          </div>
            
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  @include('layouts.footer')
  @include('layouts.salary_modal')
</div>
@include('layouts.scripts')
<script>
$(function(){
  // $('.dataTables_filter').addClass('pull-right')
  var salary = document.getElementById('salary').textContent;
  var overtime = document.getElementById('overtime').textContent;
  var deduction
  // alert(salary);
});
</script>
</body>
</html>
