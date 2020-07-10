@if (Session::get('notify') == 0)
    @if ($purchaseInvoices->isNotEmpty())
    @foreach ($purchaseInvoices as $purchaseInvoice)
<script>
var retailers = @json($purchaseInvoice->retailer->name);
            var options = {
                    body: "New Invoice from "+ retailers,
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                    
                 };
              
 notification = new Notification("Nnuro Desktop Notification", options);
notification.onclick = function(event) {
  event.preventDefault(); // prevent the browser from focusing the Notification's tab
  window.open('/admin/wholesaler/invoice');
}


</script>
@endforeach
@endif
@endif
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
                  body: "You will now receive notification",
                  icon: "https://nnuro.com/assets/img/logo.png",
                  dir : "ltr"
              };
            var notification = new Notification("Hi there",options);
          }
        });
      }
    }
    </script>