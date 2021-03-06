<div class="adding-post__input-wrapper form__textarea-wrapper <?php if (!empty($errors['post-quote-text'])) {
                                                                    print(' form__input-section--error');
                                                                } ?>">
    <label class="adding-post__label form__label" for="cite-text">Текст цитаты <span class="form__input-required">*</span></label>
    <div class="form__input-section">
        <textarea class="adding-post__textarea adding-post__textarea--quote form__textarea form__input" id="cite-text" placeholder="Текст цитаты" name="post-quote-text"><?= getPostVal('post-quote-text') ?></textarea>
        <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span></button>
        <div class="form__error-text">
            <h3 class="form__error-title">Заголовок сообщения</h3>
            <p class="form__error-desc"><?= $errors['post-quote-text']; ?></p>
        </div>
    </div>
</div>