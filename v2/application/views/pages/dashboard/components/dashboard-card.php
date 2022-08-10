<div class="col-md-6">
    <a href="<?php if (isset($card['link'])) echo base_url() . $card['link'];
                else echo '#'; ?>" class='no-a'>
        <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left text-dark">
                    <div class="widget-heading"><?= $card['title'] ?></div>
                    <div class="widget-subheading"><?= $card['captionTitle'] ?></div>
                </div>
                <div class="widget-content-right">
                    <?php
                    if (isset($card['content'])) :
                    ?>
                        <div class="widget-numbers text-primary"><span>Rp. <?= $card['content']  . substr($card['captionContent'], 0, 1) ?></span></div>

                        <?php
                    else :
                        foreach ($card['listContent'] as $i => $content) :
                        ?>
                            <div class="widget-numbers" style='font-size: 18px'><span><?= $content ?> : <?= $card['values'][$i] ?></span></div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </a>
</div>