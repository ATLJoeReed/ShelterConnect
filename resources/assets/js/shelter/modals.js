

    //edit bed values popup 
    (function () {

        var $modal = $('#editValues');
        var $form = $('#editValuesForm');

        var $occup = $form.find('input[name=occupied]');
        var $avail = $form.find('input[name=available]');
        var $unavail = $form.find('input[name=unavailable]');
        var $resrv = $form.find('input[name=reserved]');
        var $total = $form.find('input[name=total]');


        $modal.on('shown.bs.modal', function (e) {

            //get values from react component
            var vals = window.Beds.getValues();

            $occup.val(vals.occupied).on('input', updateTotal);
            $avail.val(vals.available).on('input', updateTotal);
            $resrv.val(vals.reserved);
            $unavail.val(vals.unavailable).on('input', updateTotal);
            $total.val(vals.total);

            function updateTotal() {
                var val = Number($occup.val()) + Number($avail.val()) + Number($resrv.val()) + Number($unavail.val());
                $total.val(val);
            }

            //focus input
            $occup.focus();

        });

        //handle submit
        $form.on('submit', function (e) {
            e.preventDefault();

            window.Beds.updateStateFromModal({
                available: Number($avail.val()),
                occupied: Number($occup.val()),
                unavailable: Number($unavail.val()),
                total: Number($total.val())
            });

            $modal.modal('hide');
        });
    })();
   

  

    //add reservation popup
    (function () {

        var $modal = $('#addReservation');
        var $form = $('#addReservationForm');

        var $reservationFor = $form.find('input[name=reservedFor]')
        var $expiresAt = $form.find("input[name=expiresAt]");

        $modal.on('shown.bs.modal', function (e) {
           
            // default time to twenty minutes from now
            var now = new Date(new Date().getTime() + 20 * 60 * 1000);
            $expiresAt.val(now.getHours() + ":" + now.getMinutes());

            //clear for
            $reservationFor.val('');

            //focus input
            $reservationFor.focus();

        });

        //handle submit
        $form.on('submit', function (e) {
            e.preventDefault();

            var vals = {
                name: $reservationFor.val(),
                time: $expiresAt.val() // ( need to set time ) 
            };

            // 

            window.Reservations.addReservation ( vals )
            $modal.modal('hide');
        });

    })();
