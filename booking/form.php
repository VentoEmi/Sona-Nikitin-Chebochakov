<div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
    <div class="booking-form">
        <h3>Booking Your Hotel</h3>
        <form action="booking/mail.php" method="post">
            <div class="check-date">
                <label for="date-in">Check In:</label>
                <input type="date" name="checkIn"  id="date-in" required>

            </div>
            <div class="check-date">
                <label for="date-out">Check Out:</label>
                <input type="date" name="checkOut"   id="date-out" required>

            </div>
            <div class="select-option">
                <label for="guest">Guests:</label>
                <input type="text" name="guests"  required>
            </div>
            <div class="select-option">
                <label for="room">Room:</label>
                <select name="room" id="room" required>
                    <option value="1">1 Room</option>
                    <option value="2">2 Room</option>
                </select>
            </div>
            <div class="select-option">
                <label for="email">Email:</label>
                <input type="email" name="email"  required>
            </div>
            <button type="submit">Check Availability</button>
        </form>
    </div>
</div>
