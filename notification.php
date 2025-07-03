<div class="user-notifications">
    <h3>آخرین مقالات پیشنهادی</h3>
    <?php if (!empty($articles)) : ?>
        <?php foreach ($articles as $article) : ?>
            <div class="notification">
                <strong>پیشنهاد مقاله:</strong><br>
                <a href="<?php echo esc_url($article['url']); ?>"><?php echo esc_html($article['title']); ?></a>
                <p><?php echo esc_html($article['excerpt']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>هیچ مقاله جدیدی پیدا نشد.</p>
    <?php endif; ?>

    <h3>آخرین محصولات پیشنهادی</h3>
    <?php if (!empty($products)) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="notification">
                <strong>پیشنهاد محصول:</strong><br>
                <a href="<?php echo esc_url($product['url']); ?>"><?php echo esc_html($product['title']); ?></a>
                <p><?php echo esc_html($product['excerpt']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>هیچ محصول جدیدی پیدا نشد.</p>
    <?php endif; ?>
</div>
