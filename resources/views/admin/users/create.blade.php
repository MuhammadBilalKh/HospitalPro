    @include('admin.users._form', [
        'user' => null,
        'action' => route('Users.store'),
        'type' => 'create',
    ]);

    <script>
        $(document).ready(function() {
            $("#txtMobileNumber").mask("0300 - 0000000");
            $("#txtCNIC").mask("00000 - 0000000 - 0");
            $(".alert").hide();
            $("#divProcess").hide();

            $("#ProfilePicture").on("change", function() {
                ShowPreview(this);
            });

            $("form").on("submit", function(event) {
                event.preventDefault();

                let frmData = new FormData(this);
                frmData.append('file', $('#ProfilePicture')[0].files[0]);

                $.ajax({
                    url: "{{ route('Users.store') }}",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content")
                    },
                    data: frmData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $("#divProcess").show();
                        html = "<center><img width='40px' height='40px' src='" +
                            "{{ asset('assets/images/gif/abc.gif') }}" +
                            "'/></center>";
                        html += '<h6 style="text-align:center">Processing...!</h6>';
                        $("#divProcess").html(html);
                    },
                    success: function(response) {
                        let errors = (response.errors);

                        if (errors != null) {
                            Object.entries(errors).forEach(([key, value]) => {
                                value == "" ? "" : $("#err_" + key).html(value);
                            });
                        }

                        if (response.msg) {
                            $(".alert").show();
                            $(".alert").html("<span class='text-center'>" + response.msg +
                                "</span>");
                            $(".alert").delay(3500).fadeOut();
                        }

                        $("#divProcess").hide();
                    }
                });
            })
        });

        function ShowPreview(imageFile) {
            if (imageFile.files && imageFile.files[0]) {
                let fileReader = new FileReader();

                fileReader.onload = function(e) {
                    $("#imgPreview").attr("src", e.target.result)
                }

                fileReader.readAsDataURL(imageFile.files[0]);
            }
        }
    </script>
