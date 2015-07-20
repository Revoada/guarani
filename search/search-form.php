<?php echo $this->form('search-form', $options['form_attributes']); ?>
    <div role="form" style=" padding-top:22px;">
        <div class="form-group">
            <div class="input-group">
                <?php echo $this->formText('query', $filters['query'], array('type'=>'email','class'=>'form-control no-border', 'placeholder'=>'Busca')); ?>
                <div class="input-group-addon no-border" style="background-color: #4AAAA5">
                <button type="submit" class="no-button-format"><i class="glyphicon glyphicon-search white"></i></button>
                </div>
            </div>
        </div>                
    </div>
    <?php if ($options['show_advanced']): ?>
        <fieldset id="advanced-form">
            <fieldset id="query-types">
                <p><?php echo __('Search using this query type:'); ?></p>
                <?php echo $this->formRadio('query_type', $filters['query_type'], null, $query_types); ?>
            </fieldset>
            <?php if ($record_types): ?>
            <fieldset id="record-types">
                <p><?php echo __('Search only these record types:'); ?></p>
                <?php foreach ($record_types as $key => $value): ?>
                    <?php echo $this->formCheckbox('record_types[]', $key, in_array($key, $filters['record_types']) ? array('checked' => true, 'id' => 'record_types-' . $key) : null); ?> <?php echo $value; ?><br>
                <?php endforeach; ?>
            </fieldset>
            <?php elseif (is_admin_theme()): ?>
                <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
            <?php endif; ?>
            <p><?php echo link_to_item_search(__('Advanced Search (Items only)')); ?></p>
        </fieldset>
    <?php endif; ?>
</form>

