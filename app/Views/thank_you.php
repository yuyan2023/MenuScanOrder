<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container text-center">
        <h1>Thank You!</h1>
        <p>Your feedback has been submitted successfully. We appreciate your input!</p>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Return to Home</a>
    </div>
</section>

<?= $this->endSection() ?>
