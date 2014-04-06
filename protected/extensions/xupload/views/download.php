<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2">
                <span class="label label-important">{%=locale.fileupload.error%}</span>
                {% if (file.customError) { %}
                    <span class="uploadCustomError" style="cursor: pointer;">{%= file.customError%}</span>
                    <div class="uploadValidationError alert alert-error" style="display: none;">{%=locale.fileupload.errors[file.error] || file.error%}</div>
                {% } else { %}
                    <span>{%=locale.fileupload.errors[file.error] || file.error%}</span>
                {% } %}
            </td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img width="80" src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                <input type="hidden" name="Filename[]" value="{%=file.filename%}" />
                <input type="hidden" name="Filepath[]" value="{%=file.url%}" />
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <?php if ($this->multiple) : ?><input type="checkbox" name="delete" value="1">
            <?php else: ?><input type="hidden" name="delete" value="1">
            <?php endif; ?>
        </td>
    </tr>
{% } %}
</script>
