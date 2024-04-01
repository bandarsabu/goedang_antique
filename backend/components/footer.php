<!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.slim.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
  <script src="../../vendor/vue/vue.min.js"></script>


  <script>
    AOS.init();

    $('#menu-toggle').click(function (e) {
      e.preventDefault();
      $('#wrapper').toggleClass('toggled');
    });

    function previewImage() {
      document.getElementById("image-preview").style.display = "block";
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
      };
    };

    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor1');

    // var transactionDetails = new Vue({
    //   el: "#transactionDetails",
    //   data: {
    //     status: "",
    //     resi: "",
    //   },
    // });
  </script>


</body>

</html>