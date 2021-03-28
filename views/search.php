<!-- breadcrumb area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-content">
                    <h1>Search Page</h1>
                </div>
            </div>
        </div>
    </div>
</section><!-- breadcrumb area end -->
<!-- blog area start -->
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pb-20">
                    <h1><i class="icofont icofont-search"></i></i> <?= $value; ?></h1>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">

                <?php if(count($data) != 0) { foreach ($data as $d) : ?>
                    <div style="margin-bottom: 70px;" class="single-news">
                        <div class="news-bg-1" style="background: url('<?= URL . $d->picture; ?>'); background-size: cover;"></div>
                        <div class="news-date">
                            <h2><span><?= $d->month; ?></span> <?= $d->date; ?></h2>
                            <h1><?= $d->year; ?></h1>
                        </div>
                        <div class="news-content">
                            <h2 id="data-href" onclick="window.location.href = this.getAttribute('data-href');" data-href="<?= $d->detail; ?>">
                                <?= $d->name; ?>
                            </h2>
                            <p><?= substr($d->description, 0, 100); ?></p>
                        </div>
                    </div>
                <?php endforeach; } else {echo "<p style='text-align: center; font-size: 30px; margin: 20px 0px;'>No data found</p>";} ?>
            </div>
        </div>
    </div>
</section><!-- blog area end -->