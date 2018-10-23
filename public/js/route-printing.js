$(document).ready(function () {
    let toPrint = JSON.parse(localStorage.printitems);
    $.each(toPrint,(key,data) => {
        console.log(data);
        $( "#to-print" ).append(`
            <main class="py-4">
                <div class="container">
                    <div class="row row-justified-center" style="margin-top: 40px;">
                        <div class="col-md-12">
                            <div class="col-md-6" style="margin: auto;">
                                <div class="row"> 
                                    <div class="col-md-2">
                                        <img class="logo" src="${image_url}images/Province_of_Biliran_Official_Seal.png">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="login-title">
                                            Naval Trisikad Registration System
                                        </div>
                                        <div class="login-title">
                                            ${getDate()}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <img class="logo to-right" src="${image_url}images/Naval_biliran_seal.png">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-profile">
                                <h3>Route Information:</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info-user">
                                            <b>Route Start:</b> 
                                            <div style="text-align: center">
                                                ${data.route_start} 
                                            </div>
                                        </div>
                                        <div class="info-user">
                                            <b>Rate:</b> 
                                            <div style="text-align: center">
                                                ${data.rate}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-user">
                                            <b>Route End:</b> 
                                            <div style="text-align: center">
                                                ${data.route_end} 
                                            </div>
                                        </div>
                                        <div class="info-user">
                                            <b>Rate w/ discount:</b> 
                                            <div style="text-align: center">
                                                ${data.rate_discounted}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="print-break"></div>
        `);
    });

    setTimeout(() => {
        window.print();
    }, 1000); 
})

function getDate()
{
    let monthNames = [
        "January", 
        "February", 
        "March", 
        "April", 
        "May", 
        "June",
        "July", 
        "August", 
        "September", 
        "October", 
        "November", 
        "December"
    ];

    let today = new Date();
    let y = today.getFullYear();
    let mth = today.getMonth() + 1;
    let d = today.getDate();
    return  y + '/' + d + '/' + monthNames[mth - 1]; 
}


