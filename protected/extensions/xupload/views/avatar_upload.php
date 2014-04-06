<!-- The template to display files available for upload -->
<script id="avatar-template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade avatar-template-upload">
        <td>
            <table class="">
                <tr>
                    <td class="start">
                    {% if (!o.options.autoUpload) { %}
                        <button class="btn btn-primary">
                            <i class="icon-upload icon-white"></i>
                            <span>{%=locale.fileupload.start%}</span>
                        </button>
                    {% } %}
                    </td>
                    <td class="cancel">
                    {% if (!i) { %}
                    <button class="btn btn-warning">
                        <i class="icon-ban-circle icon-white"></i>
                        <span>{%=locale.fileupload.cancel%}</span>
                    </button>
                    {% } %}
                    </td>
                </tr>
                <tr>
                    <td class="preview"><span class="fade"></span></td>
                </tr>
                {% if (file.error) { %}
                <tr>
                    <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                </tr>
                {% } else if (o.files.valid && !i) { %}
                <tr>
                    <td>
                        <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
                    </td>
                </tr>
                
                {% } %}
            </table>
        </td>
    </tr>
{% } %}
</script>
