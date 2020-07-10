{{--  
<button onclick="notifyMe()">Notify me!</button>
<script>
  // request permission on page load
document.addEventListener('DOMContentLoaded', function() {
if (!Notification) {
alert('Desktop notifications not available in your browser. Try Chromium.');
return;
}

if (Notification.permission !== 'granted')
Notification.requestPermission();
});


function notifyMe() {
if (Notification.permission !== 'granted')
Notification.requestPermission();
else {
var notification = new Notification('Notification title', {
icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
body: 'Hey there! You\'ve been notified!',
onclick: '#'
});
notification.onclick = function() {
window.open('http://stackoverflow.com/a/13328397/1269037');
};
}
}
</script>  --}}
 <button onclick="notifyMe()">Notify me!</button>

@if (Session::get('notify') == 0)
    @if ($pendingPurchaseOrders->isNotEmpty())
    @foreach ($pendingPurchaseOrders as $pendingPurchaseOrder)
<script>
var retailers = @json($pendingPurchaseOrder->retailer->name);
            var options = {
                    body: "New Purchase Order from "+ retailers,
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                    
                 };
              
 notification = new Notification("Nnuro Desktop Notification", options);
 notification.onclick = function(event) {
  event.preventDefault(); // prevent the browser from focusing the Notification's tab
  window.open('/admin/wholesaler/purchaseorderlist');
}

</script>
@endforeach
@endif
@endif  
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
