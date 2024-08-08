<div class="list-group list-group-flush">	<a href="{{ route('user.dashboard') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
    <a href="{{ route('user.orders') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a>
    <a href="{{ route('user.addresses') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
    
    <a href="{{ route('user.paymentmethods') }}"  class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>

    <a href="{{ route('user.profile') }}"  class="list-group-item active d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a>
    <a href="#" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
</div>