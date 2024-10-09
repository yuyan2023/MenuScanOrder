<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">

    
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        QR code
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
     <div id="qrcode"></div>
    </div>
  </div>
</div>


<script src="<?= base_url('easy.qrcode.min.js') ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    // Options
    var options = {
        text: "https://infs3202-e63a03eb.uqcloud.net/menuscanorder/"
    };
    
    // Create QRCode Object
    new QRCode(document.getElementById("qrcode"), options);
</script>

<?= $this->endSection() ?>
