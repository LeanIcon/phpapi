 <!--INVOICE RECEIVED NOTIFICATION-->
 @if ($retailerInv->isNotEmpty())
 @foreach ($retailerInv as $item)
 <script>
 var wholesaler = @json($item->get_wholesaler->name);
             var options = {
                     body: "New Pro-forma Invoice from "+ wholesaler,
                     icon: "http://127.0.0.1:8000/admin/assets/images/NN.png",
                     dir : "ltr"
                    
                     
                 };
             
 notification = new Notification("Nnuro Desktop Notification", options);
 notification.onclick = function(event) {
  event.preventDefault(); // prevent the browser from focusing the Notification's tab
  window.open('/admin/retailer/proforma');
}

 </script>
 @endforeach
 @endif
 <!--INVOICE RECEIVED NOTIFICATION ENDS HERE-->
{{--  <button onclick="notifyMe()">Notify me!</button>

@if (Session::get('notify') == 0)
    @if ($pendingPurchaseOrders->isNotEmpty())
    @foreach ($pendingPurchaseOrders as $pendingPurchaseOrder)
<script>
var retailers = @json($pendingPurchaseOrder->retailer->name);
            var options = {
                    body: "New Order from "+ retailers,
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                    
                 };
              
 notification = new Notification("Nnuro Desktop Notification", options);


</script>
@endforeach
@endif
@endif  --}}
{{-- @if (Session::get('notify') == 0)
    @if ($purchaseInvoices->isNotEmpty())
    @foreach ($purchaseInvoices as $purchaseInvoice)
<script>
var retailers = @json($purchaseInvoice->retailer->name);
            var options = {
                    body: "Pro Forma Invoice Accepted by "+ retailers,
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                    
                 };
              
 notification = new Notification("Nnuro Desktop Notification", options);


</script>
@endforeach
@endif
@endif --}}
{{--  @if ($purchaseOrders->isNotEmpty())
                                        @foreach ($purchaseOrders as $purchaseOrder)
                                       
   <!--CURRENTLY USING UP TO THIS END-->                                                                 
<script>
    function notifyMe() {
      if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
      }
      else if (Notification.permission === "granted") {
            var options = {
                    body: "You will now receive notifications",
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                 };
              var notification = new Notification("Hi there",options);
      }
      else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
          if (!('permission' in Notification)) {
            Notification.permission = permission;
          }
       
          if (permission === "granted") {
            var options = {
                  body: "This is the body of the notification",
                  icon: "https://nnuro.com/assets/img/logo.png",
                  dir : "ltr"
              };
            var notification = new Notification("Hi there",options);
          }
        });
      }
    }
    </script>
       @endforeach
       @endif   
<!--NOTIFICATION SYSTEM-->  --}}
