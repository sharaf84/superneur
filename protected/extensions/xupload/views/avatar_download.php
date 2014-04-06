<!-- The template to display files available for download -->
<script id="avatar-template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade avatar-template-download">
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
        {% } %}
    </tr>
{% } %}
</script>
