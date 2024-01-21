 <!-- Footer -->
 <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5 m-5">


    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 {{ __('home.Copyright') }}:
        <a class="text-reset fw-bold" href="/">Abdallah</a>
    </div>
    <!-- Copyright -->
</footer>

<!-- Bootstrap JS -->
<!-- jQuery -->
<script src="{{ asset('jquery-3.7.1.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- Select2 -->
<script src="{{ asset('select2/js/select2.min.js') }}"></script>

<script src="{{ asset('datatables/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Other JS -->
@stack('js')