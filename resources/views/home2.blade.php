@extends('layouts.index')

@section('title', "Dashboard || e-earners")

@section('breadtitle', "Dashboard")

@section('breadli')
<li class="breadcrumb-item active">Dashboard</li>               
@endsection

@section('content')
@if(Auth::user()->level < 1)
     <div class="alert alert-success"> Activate your account with KSH1,000 to earn KSH1200(plus referral bonus) ; accounts not activated in 2days are deleted . Read <b>"How it Works"</b> bellow.</div>
     <div class="alert alert-danger">
     <span class="m-b-0 text-dark"><br>MAKE PAYMENT TO PAYBILL : 4036729(EARNERS TECHNOLOGIES)<br>ACCOUNT NO : YOUR USERNAME<br><strong>IF NOT ACTIVATED  IN 5MINS AFTER PAYMENT WHATSAPP OR CALL 0766206081</strong> 
     </span>
     </div>
@elseif(Auth::user()->level == 1)
<div class="alert alert-success"> Upgrade to Level 2 with KSH700 to earn KSH2800. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 2)
<div class="alert alert-success"> Upgrade to Level 3 with KSH1,000 to earn KSH8000. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 3)
<div class="alert alert-success"> Upgrade to Level 4 with KSH2,000 to earn KSH32000. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 4)
<div class="alert alert-success"> Upgrade to Level 5 with KSH3,000 to earn KSH1,792,000. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 5)
<div class="alert alert-success"> Upgrade to Level 6 with KSH4,000 to earn KSH256,000. Check wallet balance to see if you have enough to upgrade!</div>
@endif



                         <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i> Upgrade to next Level </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form id="registerForm" method="post" >
                                <div class="modal-body">

                                   
                              
                                  <h5><i class="icon-arrow-right"></i> <b  class="text-danger">Select Prefered Upgrade method!!</b></h5>
                                  <div class="input-group">
                                                        <ul class="list-group col-sm-12">
                                                            <li class="list-group-item p-3" >
                                                                <input type="radio"  class="check " id="flat-radio-1" name="payment_method" checked data-radio="iradio_flat-red" value="wallet" >
                                                                <label for="flat-radio-1">Upgrade with Wallet Balance </b></em></label>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                 
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-outline-info waves-effect waves-light">Make Payment</button>
                                             
                                </div>
                             </form>
                              </div>
                            </div>
                        </div>





            <div class="row">
                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-light">
                                <h3 class="m-b-0 text-dark">User Summary</h3></div>
                            <div class="card-body">
                           
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                                @if(Auth::user()->level < 1)
                                <a id="buttonText" href="javascript:void(0)" class="btn btn-outline-info" ></i> Wait for admin to activate your</a>
                                @else
                                    @if(Auth::user()->level < 6)
                                    <a href="javascript:void(0)" id="buttonText" data-toggle="modal" data-target="#modal" class="btn btn-outline-success">Upgrade to next level</a>
                                    <!-- <a href="javascript:void(0)" class="btn btn-info mt-2 ml-2">Edit Profile</a> -->
                                    @else
                                    <div class="alert alert-success"> You did it! </div>
                                    @endif
                                @endif

                                <!-- <a href="javascript:void(0)" class="btn btn-outline-info" data-toggle="modal"
                          data-target="#iconModal">How to?</a> -->
                                <table class="table mt-3">
                                    
                                    <tbody>
                                        <tr >
                                            <td>Level:</td>
                                            <td class="{{Auth::user()->level == 0 ? 'text-danger' : ''}}">{{Auth::user()->level == 0 ? "Not activated" : Auth::user()->level}}</td>
                                        </tr>
                                       
                                        <tr >
                                            <td>Total Benefits:</td>
                                            <td class="text-success">KSH{{number_format($transIn)}}</td>
                                        </tr>
                                      
                                        <tr >
                                            <td>Total Withdrawal:</td>
                                            <td class="text-danger">KSH{{number_format($transOut)}}</td>
                                        </tr>
                                        <tr >
                                            <td>Joined:</td>
                                            <td class="text-dark">{{date_format(date_create(Auth::user()->created_at),"d-M-Y")}}</td>
                                        </tr>
                                        @if(Auth::user()->level > 0)
                                        <tr >
                                            <td>Referral Link:</td>
                                            <td><a class="text-info" href="https://e-earners.co.ke/register?ref={{Auth::user()->username}}">https://e-earners.co.ke/register?ref={{Auth::user()->username}}</a></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-light">
                                <h3 class="m-b-0 text-dark">Sponsor Details</h3></div>
                              <div class="card-body">
                             
                                <table class="table mt-3">
                                    
                                    <tbody>
                                        <tr >
                                            <td>Name:</td>
                                            <td>{{ !$upline ? "Nil": $upline->name }}</td>
                                        </tr>
                                        <tr >
                                            <td>Username:</td>
                                            <td>{{ !$upline ? "Nil": $upline->username }}</td>
                                        </tr>
                                        <tr >
                                            <td>Email:</td>
                                            <td>{{ !$upline ? "Nil": $upline->email }}</td>
                                        </tr>
                                        <tr >
                                        <td>Phone:</td>
                                            <td>{{ !$upline ? "Nil": $upline->phone }}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="row">
                    <div class="col-sm-6">
                    <div class="card border-success mt-2">
                            <div class="card-header bg-info">
                                <h3 class="m-b-0 text-white">How it works</h3></div>
                            <div class="card-body">

                            <h5> <b>HERE IS A STRATEGY THAT WILL ENABLE YOU TO REACH YOUR GOALS</b></h5>
                            <div class="table-responsive">
                  <table class="table table-striped">
                 
                    <tbody>
                      <tr>
                        <td scope="row">LEVEL 1: (Activation). Pay KSH1,000</td>
                      </tr>
                      <tr>
                        <td scope="row">Get 2 (downlines) x KSH600 = KSH1200 – KSH700 (move to 2) = KSH500 profit</td>
                      
                      </tr>
                      <tr>
                        <td scope="row">LEVEL 2: (Upgrade). Pay KSH700</td>
                        
                      </tr>
                      <tr>
                        <td scope="row"> 4 ( level 2 downlines) x KSH700 = KSH2,800 – KSH1000 (move to 3) = KSH1,800 profit</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">LEVEL 3: (Upgrade). Pay KSH1,000</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">8 (level 3 downlines) x KSH1,000 = KSH8,000 – KSH2,000 (move to 4) = KSH6,000 profit</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">LEVEL 4: (Upgrade). Pay KSH2,000</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">16 (level 4 downlines) x KSH2,000 = KSH32,000 – KSH3,000 (move to 5) = KSH29,000 profit</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">LEVEL 5: (Upgrade). Pay KSH3,000</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">32 ( level 5 downlines) x KSH3,000 = KSH96,000 – KSH4,000 (move to 5) = KSH92,000 profit</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">LEVEL 6: (Upgrade). Pay KSH4,000</td>
                        
                      </tr>
                      <tr>
                        <td scope="row">64 (level 6 downlines) x KSH4,000 = KSH256,000 (all yours)
                           <p> <em>No More upgrades</em></p>
                        </td>
                        
                      </tr>
                      <tr>
                        <td scope="row">Bonus
                            
                        </td>
                        
                      </tr>
                      <tr>
                        <td scope="row">KSH300 referral bonus for each person who registers through your referral link.
                            
                        </td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
                            </div>
                        </div>  
                    
                    </div>
                </div> 
                
                  


                <!-- modal -->
                <div id="daModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Upgrade to level 2</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" action="/activate-user">
                                            <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    <p>KSH2000 will be used to upgrade to level 2</p>

                                                </div>
                                                @csrf

                                                 <input type="radio" name="upgrade" value="balance" checked>Use Balance
                                                    <br>
                                                <input type="radio" name="upgrade" value="paystack"> Use Paystack
                                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger waves-effect waves-light">Activate User</button>
                                             
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: '{{$paystack_key}}',
      email: '{{Auth::user()->email}}',
      amount: {{$pay_amount * 100}},
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "{{Auth::user()->phone}}"
            },
            {
                display_name: "Username",
                variable_name: "username",
                value: "{{Auth::user()->username}}"
            }
         ]
      },
      callback: function(response){
        //   alert('success. transaction ref is ' + response.reference);
         
         document.getElementById("buttonText").innerHTML = '<h3>Processing... <i class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></i></h3>';

          $.ajax({
                url: '/verify/'+ response.reference ,
                method: 'GET'
            }).done(function(data) {
                    
                    location.reload();
                
            }).fail(function(err) {

                swal("Opps!", err.message, "error");
              
            })
            
      },
      onClose: function(){
        //   alert('window closed');

      }
    });
    handler.openIframe();
  }
</script>
@endsection