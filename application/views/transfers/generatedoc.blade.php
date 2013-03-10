

<!DOCTYPE html>
<html>
<head>

	{{ HTML::style('/css/bootstrap.min.css') }}
	
	
</head>
<html>

	<div class="container">
		<div class="row">
			<div class="span10">
				
			</div>
			<div class="span2">
				วบอ. 84-1
			</div>
		</div>
		<CENTER>
			<img src="img/cas.png" height="120" width="120">
		</CENTER>
		<div class="row">
			<CENTER>
			<div class="span12">

				<h5>
					ใบแสดงผลการพิจารณาการเทียบวิชาเรียนและโอนหน่วยกิตเบื้องต้น</br>
					สำหรับหลักสูตรระดับที่ไม่สูงกว่าปริญญาตรีเพื่อเข้าศึกษาในสถาบันอุดมศึกษาเอกชน</br>
					รหัสนักศึกษา  ชื่อ - สกุล {{ Auth::user()->name }}</br>
					หลักสูตร {{ Auth::user()->course }} สาขาวิชา {{ Auth::user()->major }}
					 ปีการศึกษา {{ Auth::user()->year }}</br>
					 หลักสูตร {{ Auth::user()->oldcourse }} จากสถาบัน {{ Auth::user()->universitie->name }} สาขาวิชา {{ Auth::user()->oldmajor }}</br>
					 คณะอนุกรรมการเทียบรายวิชาและการโอนหน่วยกิตเข้าสู่การศึกษาในระบบ คณะ {{ Auth::user()->faculty }}
				</h5>
			</div>
			</CENTER>
		</div>
			<table class="table table-hover">		
				<thead>	
					<tr>

						<th>รหัสวิชา</th>
						<th>ชื่อวิชาที่ขอเทียบโอน</br>จากสถาบันฯเดิม</th>
						<th>หน่วยกิต</th>
						<th>เกรด</th>


						<th>รหัสวิชา</th>
						<th>ชื่อวิชาที่ประสงค์จะขอเทียบโอน</br>ในสถาบันฯที่รับเข้าศึกษา</th>
						<th>หน่วยกิต</th>
						<th>ผลการเทียบโอน</th>



					</tr>
				</thead>
				<tbody>



				@foreach ($usermapping as $mapping)
					<tr>
						<td>{{ $mapping->course_mapping->intercourse->code }}</td>
						<td>{{ $mapping->course_mapping->intercourse->intercoursedetail[0]->title }}</td>
						<td>{{ $mapping->course_mapping->intercourse->intercoursedetail[0]->credit }}</td>
						<td></td>
			
						<td>{{ $mapping->course_mapping->localcourse->code }}</td>
						<td>{{ $mapping->course_mapping->localcourse->title }}</td>
						<td>{{ $mapping->course_mapping->localcourse->credit }}</td>
						<td></td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
	<div class="container">
		<div class="content">
			<div class="row">
	        	<div class="span6">
					หน่วยกิตรวมที่ขอเทียบโอน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="span1" type="text" placeholder="">
				</div>
				
				<div class="span6">
					หน่วยกิตรวมที่เทียบโอนได้&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="span1" type="text" placeholder="">
				</div>
			</div>
		</div>
	</div>
</html>
