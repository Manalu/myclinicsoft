<div style="width: 7.5in !important;
    height: 11in !important;
    margin: 10px auto;
    page-break-after: always;
    position: relative;
    font-size: 20px;
    background-color: #fff;
    color: #000;">
	<div style="margin-top: 165px;position: absolute;width: 100%;padding: 0px 30px;font-size: 22px;">
		<table style="width:100%">
			<tbody>
				<tr>
					<td style="width:15%;"><strong  style="font-size: 23px;">Name :</strong></td>
					<td style="width:50%;">
					<strong  style="font-size: 23px;">{{patient_name}}</strong>
					</td>
					<td style="width:15%;">Date:</td>
					<td style="width:20%;">{{consultation_date}}</td>
				</tr>
				<tr>
					<td style="width:15%;">Age :</td>
					<td style="width:35%;">{{patient_age}}</td>
					<td style="width:15%;">Gender :</td>
					<td style="width:35%;">{{patient_gender}}</td>
				</tr>
				<tr>
					<td style="width:15%;">Address :</td>
					<td style="width:85%;" colspan="3">
						{{patient_address}}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div style="min-height: 570px;
    font-weight: bold;
    color: rgb(51, 122, 183);
    position: absolute;
    top: 360px;
    width: 100%;
    padding: 0px 30px;
    font-size: 23px;">
		{{prescriptions}}
	</div>
	<div style="position: absolute;bottom: 75px;width: 100%;padding: 0px 30px;font-size: 20px;">
		<table style="width:100%">
			<tbody>
				<tr>
					<td style="width:100%;" colspan="2">
						Next Visit : {{next_visit}}
					</td>
				</tr>
				<tr style="border-top: 1px solid;">
					<td style="width:100%;" colspan="2">
						<span style="float: right; font-size: 22px;"><strong style="font-size: 23px;">{{business_owner}}</strong></span>
					</td>
				</tr>
				<tr>
					<td style="width:50%; vertical-align: top;">
						Patient ID : <strong  style="font-size: 23px;">{{patient_id}}</strong><br>
						<span style="font-size: 12px;">Use this ID Number on next visit.</span>
					</td>
					<td style="width:50%;" style="text-align: right;">
						<ul style="list-style: none;">
							<li>License No : {{prc}}</li>
							<li>PTR No : {{ptr}}</li>
							<li>S2 No : {{s2}}</li>
						</ul>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>