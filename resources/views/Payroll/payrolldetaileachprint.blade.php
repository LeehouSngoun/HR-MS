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
        {{'ID: PAPA-'.  sprintf("%05d",$payroll_detail->employee->id) .' Name: '.  $payroll_detail->employee->first_name . ' ' . $payroll_detail->employee->last_name }}
 
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
            <div id="box-header" class="box-header with-border">
              
            </div>
            <div class="box-body">
                <table style="border:1px black; width:100%; border-collapse: collapse;">
                  <tr>
                    <td colspan="2">
                      <h4 style="text-align: center; color:blue;">ASIA L & E Co., LTD.</h4>
                      <h6 style="text-align: center;">#F23B, Duong Ngeap 3, Sangkat Tuek Thla, Kan Sen Sok, Phnom penh, Cambodia</h6>
                      <h6 style="text-align:center; font-weight:bold;">Payslip for the period of 
                        {{ $payroll->month . ' ' . $payroll->year }}
                      </h6>
                      <table class="in-table" >
                        <tr>
                          <td class="in-td">Employee ID <br>
                            Department <br>
                            bank Acct/Cheque Number <br>
                            Days Worked <br>
                            Annual Leave
                          </td>
                          <td class="in-td">
                            : PAPA-{{ sprintf("%05d",$payroll_detail->employee_id) }} <br>
                            : {{ $payroll_detail->employee->position->department->department }} <br>
                            : {{ isset($payroll_detail->employee->bank_account)?$payroll_detail->employee->bank_account:"Cash" }} <br>
                            : {{ isset($payroll_detail->days_work)?$payroll_detail->days_work:"N/A" }} days <br>
                            : {{ isset($payroll_detail->annual_leave)?$payroll_detail->annual_leave:"N/A" }} days
                          </td>
                          <td class="in-td">
                            Name <br>
                            Position <br>
                            Bank Name <br>
                            Unpaid Leave <br>
                            Overtime Hour 
                          </td>
                          <td class="in-td">
                            : {{ $payroll_detail->employee->first_name .' '. $payroll_detail->employee->last_name }} <br>
                            : {{ $payroll_detail->employee->position->position }} <br>
                            : {{ isset($payroll_detail->employee->bank_name)?$payroll_detail->employee->bank_name:"N/A" }} <br>
                            : {{ isset($payroll_detail->unpaid_leave)?$payroll_detail->unpaid_leave:"N/A" }} <br>
                            : {{ isset($total_overtime)?$total_overtime:"N/A" }} 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <th>Earnings <span style="float: right;">Amount</span> </th>
                    <th>Deductions <span style="float: right;">Amount</span></th>
                  </tr>
                  <tr>
                    <td>
                      basic Pay <span style="float: right;">${{ isset($payroll_detail->basic_pay)?sprintf("%.2f",$payroll_detail->basic_pay):"0.00" }}</span> <br>
                      Education Allowance <span style="float: right;">${{ isset($payroll_detail->education_allowance)?sprintf("%.2f",$payroll_detail->education_allowance):"0.00" }}</span> <br>
                      Transport Allowance <span style="float: right;">${{ isset($payroll_detail->transport_allowance)?sprintf("%.2f",$payroll_detail->transport_allowance):"0.00" }}</span> <br>
                      Food Allowance <span style="float: right;">${{ isset($payroll_detail->food_allowance)?sprintf("%.2f",$payroll_detail->food_allowance):"0.00" }}</span> <br>
                      Overtime Allowance <span style="float: right;">${{ isset($payroll_detail->overtime_allowance)?sprintf("%.2f",$payroll_detail->overtime_allowance):"0.00" }}</span>
                    </td>
                    <td>
                      Property Damage <span style="float: right;">${{ isset($payroll_detail->property_damage)?sprintf("%.2f",$payroll_detail->property_damage):"0.00" }}</span> <br>
                      Loans <span style="float: right;">${{ isset($payroll_detail->loan)?sprintf("%.2f",$payroll_detail->loan):"0.00" }}</span> <br>
                      Tax <span style="float: right;">${{ isset($payroll_detail->tax)?sprintf("%.2f",$payroll_detail->tax):"0.00" }}</span> <br><br> <br>
                      
                    </td>
                  </tr>
                  <tr>
                    <th>Earning <span style="float: right;">${{ isset($payroll_detail->total_earning)?sprintf("%.2f",$payroll_detail->total_earning):"0.00" }}</span></th>
                    <th>Deduction <span style="float: right;">${{ isset($payroll_detail->total_deduction)?sprintf("%.2f",$payroll_detail->total_deduction):"0.00" }}</span></th>
                  </tr>
                  <tr>
                    <th colspan="2" style="text-align: center;">Net pay <span style="float: right;">${{ isset($payroll_detail->net_pay)?sprintf("%.2f",$payroll_detail->net_pay):"0.00" }}</span></th>
                  </tr>
                  <tr>
                    <th colspan="2" style="height:100px;">
                      <table class="in-table" style="height: 100px;">
                        <tr>
                          <br>
                        </tr>
                        <tr>
                          <th class="in-td" >
                      <div class="line"></div> <br>
                      Employer's signature</th>
                      <th class="in-td">
                      <div class="line" style=" position:flex; float:right; " ></div> <br>
                      <div style="float:right;">Employee's signature</div> 
                      </th>
                    </tr>
                    </table>
                    </th>
                  </tr>


                </table>
            </div>
            
          </div>
        </div>
      </div>
      <button class="btn btn-primary" id="printPageButton" onClick="window.print();">Print</button>
    </section>   
  </div>
    
  @include('layouts.footer')
  @include('layouts.salary_modal')
</div>
<style>
  table, th, td {
    font-size: 8pt;
    border: 1px solid black;
    border-collapse: collapse;
    padding:0 3px;
  }
  td{
    width:50%;
  }
  .in-table{
    width:100%; border: none;
  }
  .in-td{
    width:25%; border: none; padding:0;
  }
  .line{
    width:200px; height: 10px; border-bottom: 1px solid black; float:left;
    vertical-align:top;
    position: relative;
  }
  @media print {
    .box-body{-webkit-print-color-adjust: exact;}
    
  #printPageButton {
    display: none;
  }
  #box-head{
    display: none;
  }
  #main-footer{
    display: none;
  }
}
  </style>
@include('layouts.scripts')
<script>
$(function(){
//   $('#print_button').click(function() {
//     window.print('.box-body');
// });
  // $('.dataTables_filter').addClass('pull-right')
  var salary = document.getElementById('salary').textContent;
  var overtime = document.getElementById('overtime').textContent;
  var deduction
  // alert(salary);
  
});
</script>
</body>
</html>
