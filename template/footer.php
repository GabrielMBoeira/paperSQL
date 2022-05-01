<footer class="footer d-flex justify-content-end align-items-center">
    <div class="footer-content m-3">
        Uniasselvi Team <?= date('Y') ?> &copy;
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    function mascara_cpf(){

        let cpf = window.document.getElementById('cpf')

        if(cpf.value.length == 3 || cpf.value.length == 7){
            cpf.value += '.'
        }else if(cpf.value.length == 11){
            cpf.value += '-'
        }
    }
</script>

</body>

</html>