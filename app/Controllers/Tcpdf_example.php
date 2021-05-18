<?php namespace App\Controllers;

class Tcpdf_example extends BaseController
{
	public function e001()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 001');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, [0, 64, 255], [0, 64, 128]);
		$pdf->setFooterData([0, 64, 0], [0, 64, 128]);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(['enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => [196, 196, 196], 'opacity' => 1, 'blend_mode' => 'Normal']);

		// Set some content to print
		$html_code = view('Tcpdf/e001');
		$html      = <<<EOD
		{$html_code}
		EOD;

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------
		$this->response->setContentType('application/pdf');
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e002()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 002');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', 'BI', 20);

		// add a page
		$pdf->AddPage();

		// set some text to print
		$txt = <<<EOD
TCPDF Example 002

Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;

		// print a block of text using Write()
		$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_002.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e003()
	{
		// create new PDF document
		$pdf = new \App\Libraries\Mypdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 003');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', 'BI', 12);

		// add a page
		$pdf->AddPage();

		// set some text to print
		$txt = <<<EOD
		TCPDF Example 003

		Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
		EOD;

		// print a block of text using Write()
		$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_003.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e004()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 004');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 004', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 11);

		// add a page
		$pdf->AddPage();

		//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

		// test Cell stretching
		$pdf->Cell(0, 0, 'TEST CELL STRETCH: no stretch', 1, 1, 'C', 0, '', 0);
		$pdf->Cell(0, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);
		$pdf->Cell(0, 0, 'TEST CELL STRETCH: force scaling', 1, 1, 'C', 0, '', 2);
		$pdf->Cell(0, 0, 'TEST CELL STRETCH: spacing', 1, 1, 'C', 0, '', 3);
		$pdf->Cell(0, 0, 'TEST CELL STRETCH: force spacing', 1, 1, 'C', 0, '', 4);

		$pdf->Ln(5);

		$pdf->Cell(45, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);
		$pdf->Cell(45, 0, 'TEST CELL STRETCH: force scaling', 1, 1, 'C', 0, '', 2);
		$pdf->Cell(45, 0, 'TEST CELL STRETCH: spacing', 1, 1, 'C', 0, '', 3);
		$pdf->Cell(45, 0, 'TEST CELL STRETCH: force spacing', 1, 1, 'C', 0, '', 4);

		$pdf->AddPage();

		// example using general stretching and spacing

		for ($stretching = 90; $stretching <= 110; $stretching += 10)
		{
			for ($spacing = -0.254; $spacing <= 0.254; $spacing += 0.254)
			{
				// set general stretching (scaling) value
				$pdf->setFontStretching($stretching);

				// set general spacing value
				$pdf->setFontSpacing($spacing);

				$pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, no stretch', 1, 1, 'C', 0, '', 0);
				$pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, scaling', 1, 1, 'C', 0, '', 1);
				$pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, force scaling', 1, 1, 'C', 0, '', 2);
				$pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, spacing', 1, 1, 'C', 0, '', 3);
				$pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, force spacing', 1, 1, 'C', 0, '', 4);

				$pdf->Ln(2);
			}
		}

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_004.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e005()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 005');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 005', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 10);

		// add a page
		$pdf->AddPage();

		// set cell padding
		$pdf->setCellPaddings(1, 1, 1, 1);

		// set cell margins
		$pdf->setCellMargins(1, 1, 1, 1);

		// set color for background
		$pdf->SetFillColor(255, 255, 127);

		// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

		// set some text for example
		$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

		// Multicell test
		$pdf->MultiCell(55, 5, '[LEFT] ' . $txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(55, 5, '[RIGHT] ' . $txt, 1, 'R', 0, 1, '', '', true);
		$pdf->MultiCell(55, 5, '[CENTER] ' . $txt, 1, 'C', 0, 0, '', '', true);
		$pdf->MultiCell(55, 5, '[JUSTIFY] ' . $txt . "\n", 1, 'J', 1, 2, '', '', true);
		$pdf->MultiCell(55, 5, '[DEFAULT] ' . $txt, 1, '', 0, 1, '', '', true);

		$pdf->Ln(4);

		// set color for background
		$pdf->SetFillColor(220, 255, 220);

		// Vertical alignment
		$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - TOP] ' . $txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'T');
		$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - MIDDLE] ' . $txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'M');
		$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - BOTTOM] ' . $txt, 1, 'J', 1, 1, '', '', true, 0, false, true, 40, 'B');

		$pdf->Ln(4);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// set color for background
		$pdf->SetFillColor(215, 235, 255);

		// set some text for example
		$txt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.

		Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.';

		// print a blox of text using multicell()
		$pdf->MultiCell(80, 5, $txt . "\n", 1, 'J', 1, 1, '', '', true);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// AUTO-FITTING

		// set color for background
		$pdf->SetFillColor(255, 235, 235);

		// Fit text on cell by reducing font size
		$pdf->MultiCell(55, 60, '[FIT CELL] ' . $txt . "\n", 1, 'J', 1, 1, 125, 145, true, 0, false, true, 60, 'M', true);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// CUSTOM PADDING

		// set color for background
		$pdf->SetFillColor(255, 255, 215);

		// set font
		$pdf->SetFont('helvetica', '', 8);

		// set cell padding
		$pdf->setCellPaddings(2, 4, 6, 8);

		$txt = "CUSTOM PADDING:\nLeft=2, Top=4, Right=6, Bottom=8\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue.\n";

		$pdf->MultiCell(55, 5, $txt, 1, 'J', 1, 2, 125, 210, true);

		// move pointer to last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_005.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e006()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 006');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('dejavusans', '', 10);

		// add a page
		$pdf->AddPage();

		// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
		// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

		// create some HTML content
		$html = '<h1>HTML Example</h1>
		Some special characters: &lt; € &euro; &#8364; &amp; è &egrave; &copy; &gt; \\slash \\\\double-slash \\\\\\triple-slash
		<h2>List</h2>
		List example:
		<ol>
			<li><img src="images/logo_example.png" alt="test alt attribute" width="30" height="30" border="0" /> test image</li>
			<li><b>bold text</b></li>
			<li><i>italic text</i></li>
			<li><u>underlined text</u></li>
			<li><b>b<i>bi<u>biu</u>bi</i>b</b></li>
			<li><a href="http://www.tecnick.com" dir="ltr">link to http://www.tecnick.com</a></li>
			<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>
			<li>SUBLIST
				<ol>
					<li>row one
						<ul>
							<li>sublist</li>
						</ul>
					</li>
					<li>row two</li>
				</ol>
			</li>
			<li><b>T</b>E<i>S</i><u>T</u> <del>line through</del></li>
			<li><font size="+3">font + 3</font></li>
			<li><small>small text</small> normal <small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal</li>
		</ol>
		<dl>
			<dt>Coffee</dt>
			<dd>Black hot drink</dd>
			<dt>Milk</dt>
			<dd>White cold drink</dd>
		</dl>
		<div style="text-align:center">IMAGES<br />
		<img src="images/logo_example.png" alt="test alt attribute" width="100" height="100" border="0" /><img src="images/logo_example.jpg" alt="test alt attribute" width="100" height="100" border="0" />
		</div>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// output some RTL HTML content
		$html = '<div style="text-align:center">The words &#8220;<span dir="rtl">&#1502;&#1494;&#1500; [mazel] &#1496;&#1493;&#1489; [tov]</span>&#8221; mean &#8220;Congratulations!&#8221;</div>';
		$pdf->writeHTML($html, true, false, true, false, '');

		// test some inline CSS
		$html = '<p>This is just an example of html code to demonstrate some supported CSS inline styles.
		<span style="font-weight: bold;">bold text</span>
		<span style="text-decoration: line-through;">line-trough</span>
		<span style="text-decoration: underline line-through;">underline and line-trough</span>
		<span style="color: rgb(0, 128, 64);">color</span>
		<span style="background-color: rgb(255, 0, 0); color: rgb(255, 255, 255);">background color</span>
		<span style="font-weight: bold;">bold</span>
		<span style="font-size: xx-small;">xx-small</span>
		<span style="font-size: x-small;">x-small</span>
		<span style="font-size: small;">small</span>
		<span style="font-size: medium;">medium</span>
		<span style="font-size: large;">large</span>
		<span style="font-size: x-large;">x-large</span>
		<span style="font-size: xx-large;">xx-large</span>
		</p>';

		$pdf->writeHTML($html, true, false, true, false, '');

		// reset pointer to the last page
		$pdf->lastPage();

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Print a table

		// add a page
		$pdf->AddPage();

		// create some HTML content
		$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';

		$html = '<h2>HTML TABLE:</h2>
		<table border="1" cellspacing="3" cellpadding="4">
			<tr>
				<th>#</th>
				<th align="right">RIGHT align</th>
				<th align="left">LEFT align</th>
				<th>4A</th>
			</tr>
			<tr>
				<td>1</td>
				<td bgcolor="#cccccc" align="center" colspan="2">A1 ex<i>amp</i>le <a href="http://www.tcpdf.org">link</a> column span. One two tree four five six seven eight nine ten.<br />line after br<br /><small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal  bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla<ol><li>first<ol><li>sublist</li><li>sublist</li></ol></li><li>second</li></ol><small color="#FF0000" bgcolor="#FFFF00">small small small small small small small small small small small small small small small small small small small small</small></td>
				<td>4B</td>
			</tr>
			<tr>
				<td>' . $subtable . '</td>
				<td bgcolor="#0000FF" color="yellow" align="center">A2 € &euro; &#8364; &amp; è &egrave;<br/>A2 € &euro; &#8364; &amp; è &egrave;</td>
				<td bgcolor="#FFFF00" align="left"><font color="#FF0000">Red</font> Yellow BG</td>
				<td>4C</td>
			</tr>
			<tr>
				<td>1A</td>
				<td rowspan="2" colspan="2" bgcolor="#FFFFCC">2AA<br />2AB<br />2AC</td>
				<td bgcolor="#FF0000">4D</td>
			</tr>
			<tr>
				<td>1B</td>
				<td>4E</td>
			</tr>
			<tr>
				<td>1C</td>
				<td>2C</td>
				<td>3C</td>
				<td>4F</td>
			</tr>
		</table>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// Print some HTML Cells

		$html = '<span color="red">red</span> <span color="green">green</span> <span color="blue">blue</span><br /><span color="red">red</span> <span color="green">green</span> <span color="blue">blue</span>';

		$pdf->SetFillColor(255, 255, 0);

		$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
		$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 1, true, 'C', true);
		$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'R', true);

		// reset pointer to the last page
		$pdf->lastPage();

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Print a table

		// add a page
		$pdf->AddPage();

		// create some HTML content
		$html = '<h1>Image alignments on HTML table</h1>
		<table cellpadding="1" cellspacing="1" border="1" style="text-align:center;">
		<tr><td><img src="images/logo_example.png" border="0" height="41" width="41" /></td></tr>
		<tr style="text-align:left;"><td><img src="images/logo_example.png" border="0" height="41" width="41" align="top" /></td></tr>
		<tr style="text-align:center;"><td><img src="images/logo_example.png" border="0" height="41" width="41" align="middle" /></td></tr>
		<tr style="text-align:right;"><td><img src="images/logo_example.png" border="0" height="41" width="41" align="bottom" /></td></tr>
		<tr><td style="text-align:left;"><img src="images/logo_example.png" border="0" height="41" width="41" align="top" /></td></tr>
		<tr><td style="text-align:center;"><img src="images/logo_example.png" border="0" height="41" width="41" align="middle" /></td></tr>
		<tr><td style="text-align:right;"><img src="images/logo_example.png" border="0" height="41" width="41" align="bottom" /></td></tr>
		</table>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// reset pointer to the last page
		$pdf->lastPage();

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// Print all HTML colors

		// add a page
		$pdf->AddPage();

		$textcolors = '<h1>HTML Text Colors</h1>';
		$bgcolors   = '<h1>HTML Background Colors</h1>';

		foreach (\TCPDF_COLORS::$webcolor as $k => $v)
		{
			$textcolors .= '<span color="#' . $v . '">' . $v . '</span> ';
			$bgcolors   .= '<span bgcolor="#' . $v . '" color="#333333">' . $v . '</span> ';
		}

		// output the HTML content
		$pdf->writeHTML($textcolors, true, false, true, false, '');
		$pdf->writeHTML($bgcolors, true, false, true, false, '');

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// Test word-wrap

		// create some HTML content
		$html = '
		<h1>Various tests</h1>
		<a href="#2">link to page 2</a><br />
		<font face="courier"><b>thisisaverylongword</b></font> <font face="helvetica"><i>thisisanotherverylongword</i></font> <font face="times"><b>thisisaverylongword</b></font> thisisanotherverylongword <font face="times">thisisaverylongword</font> <font face="courier"><b>thisisaverylongword</b></font> <font face="helvetica"><i>thisisanotherverylongword</i></font> <font face="times"><b>thisisaverylongword</b></font> thisisanotherverylongword <font face="times">thisisaverylongword</font> <font face="courier"><b>thisisaverylongword</b></font> <font face="helvetica"><i>thisisanotherverylongword</i></font> <font face="times"><b>thisisaverylongword</b></font> thisisanotherverylongword <font face="times">thisisaverylongword</font> <font face="courier"><b>thisisaverylongword</b></font> <font face="helvetica"><i>thisisanotherverylongword</i></font> <font face="times"><b>thisisaverylongword</b></font> thisisanotherverylongword <font face="times">thisisaverylongword</font> <font face="courier"><b>thisisaverylongword</b></font> <font face="helvetica"><i>thisisanotherverylongword</i></font> <font face="times"><b>thisisaverylongword</b></font> thisisanotherverylongword <font face="times">thisisaverylongword</font>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// Test fonts nesting
		$html1 = 'Default <font face="courier">Courier <font face="helvetica">Helvetica <font face="times">Times <font face="dejavusans">dejavusans </font>Times </font>Helvetica </font>Courier </font>Default';
		$html2 = '<small>small text</small> normal <small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal';
		$html3 = '<font size="10" color="#ff7f50">The</font> <font size="10" color="#6495ed">quick</font> <font size="14" color="#dc143c">brown</font> <font size="18" color="#008000">fox</font> <font size="22"><a href="http://www.tcpdf.org">jumps</a></font> <font size="22" color="#a0522d">over</font> <font size="18" color="#da70d6">the</font> <font size="14" color="#9400d3">lazy</font> <font size="10" color="#da70d6">dog</font>.';
		$html4 = '<font size="10" color="#ff7f50">The</font> <font size="10" color="#6495ed">quick</font> <font size="14" color="#dc143c">brown</font> <font size="18" color="#008000">fox</font> <font size="22"><a href="http://www.tcpdf.org">jumps</a></font> <font size="22" color="#a0522d">over</font> <font size="18" color="#da70d6">the</font> <font size="14" color="#9400d3">lazy</font> <font size="10" color="#da70d6">dog</font>.';

		$html = $html1 . '<br>' . $html2 . '<br>' . $html3 . '<br>' . $html3 . '<br>' . $html2;

		// output the HTML content
		$pdf->writeHTML($html1 . '<br>' . $html2 . '<br>' . $html4, true, false, true, false, '');
		// test pre tag

		// add a page
		$pdf->AddPage();

		$html = <<<EOF
		<div style="background-color:#880000;color:white;">
		Hello World!<br />
		Hello
		</div>
		<pre style="background-color:#336699;color:white;">
		int main() {
			printf("HelloWorld");
			return 0;
		}
		</pre>
		<tt>Monospace font</tt>, normal font, <tt>monospace font</tt>, normal font.
		<br />
		<div style="background-color:#880000;color:white;">DIV LEVEL 1<div style="background-color:#008800;color:white;">DIV LEVEL 2</div>DIV LEVEL 1</div>
		<br />
		<span style="background-color:#880000;color:white;">SPAN LEVEL 1 <span style="background-color:#008800;color:white;">SPAN LEVEL 2</span> SPAN LEVEL 1</span>
		EOF;

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// test custom bullet points for list

		// add a page
		$pdf->AddPage();

		$html = <<<EOF
		<h1>Test custom bullet image for list items</h1>
		<ul style="font-size:14pt;list-style-type:img|png|4|4|images/logo_example.png">
			<li>test custom bullet image</li>
			<li>test custom bullet image</li>
			<li>test custom bullet image</li>
			<li>test custom bullet image</li>
		<ul>
		EOF;

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_006.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e007()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 007');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 007', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 12);

		// add a page
		$pdf->AddPage();

		// create columns content
		$left_column = '<b>LEFT COLUMN</b> left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column';

		$right_column = '<b>RIGHT COLUMN</b> right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column';

		// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

		// get current vertical position
		$y = $pdf->getY();

		// set color for background
		$pdf->SetFillColor(255, 255, 200);

		// set color for text
		$pdf->SetTextColor(0, 63, 127);

		// write the first column
		$pdf->writeHTMLCell(80, '', '', $y, $left_column, 1, 0, 1, true, 'J', true);

		// set color for background
		$pdf->SetFillColor(215, 235, 255);

		// set color for text
		$pdf->SetTextColor(127, 31, 0);

		// write the second column
		$pdf->writeHTMLCell(80, '', '', '', $right_column, 1, 1, 1, true, 'J', true);

		// reset pointer to the last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_007.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e008()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 008');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 008', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// set font
		$pdf->SetFont('freeserif', '', 12);

		// add a page
		$pdf->AddPage();

		// get esternal file content
		$utf8text = file_get_contents('data/utf8test.txt', false);

		// set color for text
		$pdf->SetTextColor(0, 63, 127);

		//Write($h, $txt, $link='', $fill=0, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0)

		// write the text
		$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_008.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e009()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 009');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 009', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// -------------------------------------------------------------------

		// add a page
		$pdf->AddPage();

		// set JPEG quality
		$pdf->setJPEGQuality(75);

		// Image method signature:
		// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// Example of Image from data stream ('PHP rules')
		$imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');

		// The '@' character is used to indicate that follows an image data stream and not an image file name
		$pdf->Image('@' . $imgdata);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// Image example with resizing
		$pdf->Image('images/image_demo.jpg', 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// test fitbox with all alignment combinations

		$horizontal_alignments = [
			'L',
			'C',
			'R',
		];
		$vertical_alignments   = [
			'T',
			'M',
			'B',
		];

		$x = 15;
		$y = 35;
		$w = 30;
		$h = 30;
		// test all combinations of alignments
		for ($i = 0; $i < 3; ++$i)
		{
			$fitbox = $horizontal_alignments[$i] . ' ';
			$x      = 15;
			for ($j = 0; $j < 3; ++$j)
			{
				$fitbox[1] = $vertical_alignments[$j];
				$pdf->Rect($x, $y, $w, $h, 'F', [], [128, 255, 128]);
				$pdf->Image('images/image_demo.jpg', $x, $y, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
				$x += 32; // new column
			}
			$y += 32; // new row
		}

		$x = 115;
		$y = 35;
		$w = 25;
		$h = 50;
		for ($i = 0; $i < 3; ++$i)
		{
			$fitbox = $horizontal_alignments[$i] . ' ';
			$x      = 115;
			for ($j = 0; $j < 3; ++$j)
			{
				$fitbox[1] = $vertical_alignments[$j];
				$pdf->Rect($x, $y, $w, $h, 'F', [], [128, 255, 255]);
				$pdf->Image('images/image_demo.jpg', $x, $y, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
				$x += 27; // new column
			}
			$y += 52; // new row
		}

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// Stretching, position and alignment example

		$pdf->SetXY(110, 200);
		$pdf->Image('images/image_demo.jpg', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
		$pdf->Image('images/image_demo.jpg', '', '', 40, 40, '', '', '', false, 300, '', false, false, 1, false, false, false);

		// -------------------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_009.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e010()
	{
		// create new PDF document
		$pdf = new \App\Libraries\MC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 010');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 010', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// print TEXT
		$pdf->PrintChapter(1, 'LOREM IPSUM [TEXT]', 'data/chapter_demo_1.txt', false);

		// print HTML
		$pdf->PrintChapter(2, 'LOREM IPSUM [HTML]', 'data/chapter_demo_2.txt', true);

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_010.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e011()
	{
		// create new PDF document
		$pdf = new \App\Libraries\MYPDFe011(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 011');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 011', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('helvetica', '', 12);

		// add a page
		$pdf->AddPage();

		// column titles
		$header = [
			'Country',
			'Capital',
			'Area (sq km)',
			'Pop. (thousands)',
		];

		// data loading
		$data = $pdf->LoadData('data/table_data_demo.txt');

		// print colored table
		$pdf->ColoredTable($header, $data);

		// ---------------------------------------------------------

		// close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_011.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e012()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 012');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// disable header and footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('helvetica', '', 10);

		// add a page
		$pdf->AddPage();

		$style  = [
			'width' => 0.5,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => '10,20,5,10',
			'phase' => 10,
			'color' => [
				255,
				0,
				0,
			],
		];
		$style2 = [
			'width' => 0.5,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => [
				255,
				0,
				0,
			],
		];
		$style3 = [
			'width' => 1,
			'cap'   => 'round',
			'join'  => 'round',
			'dash'  => '2,10',
			'color' => [
				255,
				0,
				0,
			],
		];
		$style4 = [
			'L' => 0,
			'T' => [
				'width' => 0.25,
				'cap'   => 'butt',
				'join'  => 'miter',
				'dash'  => '20,10',
				'phase' => 10,
				'color' => [
					100,
					100,
					255,
				],
			],
			'R' => [
				'width' => 0.50,
				'cap'   => 'round',
				'join'  => 'miter',
				'dash'  => 0,
				'color' => [
					50,
					50,
					127,
				],
			],
			'B' => [
				'width' => 0.75,
				'cap'   => 'square',
				'join'  => 'miter',
				'dash'  => '30,10,5,10',
			],
		];
		$style5 = [
			'width' => 0.25,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => [
				0,
				64,
				128,
			],
		];
		$style6 = [
			'width' => 0.5,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => '10,10',
			'color' => [
				0,
				128,
				0,
			],
		];
		$style7 = [
			'width' => 0.5,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => [
				255,
				128,
				0,
			],
		];

		// Line
		$pdf->Text(5, 4, 'Line examples');
		$pdf->Line(5, 10, 80, 30, $style);
		$pdf->Line(5, 10, 5, 30, $style2);
		$pdf->Line(5, 10, 80, 10, $style3);

		// Rect
		$pdf->Text(100, 4, 'Rectangle examples');
		$pdf->Rect(100, 10, 40, 20, 'DF', $style4, [220, 220, 200]);
		$pdf->Rect(145, 10, 40, 20, 'D', ['all' => $style3]);

		// Curve
		$pdf->Text(5, 34, 'Curve examples');
		$pdf->Curve(5, 40, 30, 55, 70, 45, 60, 75, null, $style6);
		$pdf->Curve(80, 40, 70, 75, 150, 45, 100, 75, 'F', $style6);
		$pdf->Curve(140, 40, 150, 55, 180, 45, 200, 75, 'DF', $style6, [200, 220, 200]);

		// Circle and ellipse
		$pdf->Text(5, 79, 'Circle and ellipse examples');
		$pdf->SetLineStyle($style5);
		$pdf->Circle(25, 105, 20);
		$pdf->Circle(25, 105, 10, 90, 180, null, $style6);
		$pdf->Circle(25, 105, 10, 270, 360, 'F');
		$pdf->Circle(25, 105, 10, 270, 360, 'C', $style6);

		$pdf->SetLineStyle($style5);
		$pdf->Ellipse(100, 103, 40, 20);
		$pdf->Ellipse(100, 105, 20, 10, 0, 90, 180, null, $style6);
		$pdf->Ellipse(100, 105, 20, 10, 0, 270, 360, 'DF', $style6);

		$pdf->SetLineStyle($style5);
		$pdf->Ellipse(175, 103, 30, 15, 45);
		$pdf->Ellipse(175, 105, 15, 7.50, 45, 90, 180, null, $style6);
		$pdf->Ellipse(175, 105, 15, 7.50, 45, 270, 360, 'F', $style6, [220, 200, 200]);

		// Polygon
		$pdf->Text(5, 129, 'Polygon examples');
		$pdf->SetLineStyle(['width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => [0, 0, 0]]);
		$pdf->Polygon([5, 135, 45, 135, 15, 165]);
		$pdf->Polygon([60, 135, 80, 135, 80, 155, 70, 165, 50, 155], 'DF', [$style6, $style7, $style7, 0, $style6], [220, 200, 200]);
		$pdf->Polygon([120, 135, 140, 135, 150, 155, 110, 155], 'D', [$style6, 0, $style7, $style6]);
		$pdf->Polygon([160, 135, 190, 155, 170, 155, 200, 160, 160, 165], 'DF', ['all' => $style6], [220, 220, 220]);

		// Polygonal Line
		$pdf->SetLineStyle(['width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => [0, 0, 164]]);
		$pdf->PolyLine([80, 165, 90, 160, 100, 165, 110, 160, 120, 165, 130, 160, 140, 165], 'D', [], []);

		// Regular polygon
		$pdf->Text(5, 169, 'Regular polygon examples');
		$pdf->SetLineStyle($style5);
		$pdf->RegularPolygon(20, 190, 15, 6, 0, 1, 'F');
		$pdf->RegularPolygon(55, 190, 15, 6);
		$pdf->RegularPolygon(55, 190, 10, 6, 45, 0, 'DF', [$style6, 0, $style7, 0, $style7, $style7]);
		$pdf->RegularPolygon(90, 190, 15, 3, 0, 1, 'DF', ['all' => $style5], [200, 220, 200], 'F', [255, 200, 200]);
		$pdf->RegularPolygon(125, 190, 15, 4, 30, 1, null, ['all' => $style5], null, null, $style6);
		$pdf->RegularPolygon(160, 190, 15, 10);

		// Star polygon
		$pdf->Text(5, 209, 'Star polygon examples');
		$pdf->SetLineStyle($style5);
		$pdf->StarPolygon(20, 230, 15, 20, 3, 0, 1, 'F');
		$pdf->StarPolygon(55, 230, 15, 12, 5);
		$pdf->StarPolygon(55, 230, 7, 12, 5, 45, 0, 'DF', ['all' => $style7], [220, 220, 200], 'F', [255, 200, 200]);
		$pdf->StarPolygon(90, 230, 15, 20, 6, 0, 1, 'DF', ['all' => $style5], [220, 220, 200], 'F', [255, 200, 200]);
		$pdf->StarPolygon(125, 230, 15, 5, 2, 30, 1, null, ['all' => $style5], null, null, $style6);
		$pdf->StarPolygon(160, 230, 15, 10, 3);
		$pdf->StarPolygon(160, 230, 7, 50, 26);

		// Rounded rectangle
		$pdf->Text(5, 249, 'Rounded rectangle examples');
		$pdf->SetLineStyle(['width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => [0, 0, 0]]);
		$pdf->RoundedRect(5, 255, 40, 30, 3.50, '1111', 'DF');
		$pdf->RoundedRect(50, 255, 40, 30, 6.50, '1000');
		$pdf->RoundedRect(95, 255, 40, 30, 10.0, '1111', null, $style6);
		$pdf->RoundedRect(140, 255, 40, 30, 8.0, '0101', 'DF', $style6, [200, 200, 200]);

		// Arrows
		$pdf->Text(185, 249, 'Arrows');
		$pdf->SetLineStyle($style5);
		$pdf->SetFillColor(255, 0, 0);
		$pdf->Arrow(200, 280, 185, 266, 0, 5, 15);
		$pdf->Arrow(200, 280, 190, 263, 1, 5, 15);
		$pdf->Arrow(200, 280, 195, 261, 2, 5, 15);
		$pdf->Arrow(200, 280, 200, 260, 3, 5, 15);

		// - . - . - . - . - . - . - . - . - . - . - . - . - . - . -

		// ellipse

		// add a page
		$pdf->AddPage();

		$pdf->Cell(0, 0, 'Arc of Ellipse');

		// center of ellipse
		$xc = 100;
		$yc = 100;

		// X Y axis
		$pdf->SetDrawColor(200, 200, 200);
		$pdf->Line($xc - 50, $yc, $xc + 50, $yc);
		$pdf->Line($xc, $yc - 50, $xc, $yc + 50);

		// ellipse axis
		$pdf->SetDrawColor(200, 220, 255);
		$pdf->Line($xc - 50, $yc - 50, $xc + 50, $yc + 50);
		$pdf->Line($xc - 50, $yc + 50, $xc + 50, $yc - 50);

		// ellipse
		$pdf->SetDrawColor(200, 255, 200);
		$pdf->Ellipse($xc, $yc, 30, 15, 45, 0, 360, 'D', [], [], 2);

		// ellipse arc
		$pdf->SetDrawColor(255, 0, 0);
		$pdf->Ellipse($xc, $yc, 30, 15, 45, 45, 90, 'D', [], [], 2);

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_012.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e013()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 013');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 013', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('helvetica', 'B', 20);

		// add a page
		$pdf->AddPage();

		$pdf->Write(0, 'Graphic Transformations', '', 0, 'C', 1, 0, false, false, 0);

		// set font
		$pdf->SetFont('helvetica', '', 10);

		// --- Scaling ---------------------------------------------
		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(50, 70, 40, 10, 'D');
		$pdf->Text(50, 66, 'Scale');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		// Start Transformation
		$pdf->StartTransform();
		// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
		$pdf->ScaleXY(150, 50, 80);
		$pdf->Rect(50, 70, 40, 10, 'D');
		$pdf->Text(50, 66, 'Scale');
		// Stop Transformation
		$pdf->StopTransform();

		// --- Translation -----------------------------------------
		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(125, 70, 40, 10, 'D');
		$pdf->Text(125, 66, 'Translate');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		// Start Transformation
		$pdf->StartTransform();
		// Translate 7 to the right, 5 to the bottom
		$pdf->Translate(7, 5);
		$pdf->Rect(125, 70, 40, 10, 'D');
		$pdf->Text(125, 66, 'Translate');
		// Stop Transformation
		$pdf->StopTransform();

		// --- Rotation --------------------------------------------
		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(70, 100, 40, 10, 'D');
		$pdf->Text(70, 96, 'Rotate');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		// Start Transformation
		$pdf->StartTransform();
		// Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
		$pdf->Rotate(20, 70, 110);
		$pdf->Rect(70, 100, 40, 10, 'D');
		$pdf->Text(70, 96, 'Rotate');
		// Stop Transformation
		$pdf->StopTransform();

		// --- Skewing ---------------------------------------------
		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(125, 100, 40, 10, 'D');
		$pdf->Text(125, 96, 'Skew');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		// Start Transformation
		$pdf->StartTransform();
		// skew 30 degrees along the x-axis centered by (125,110) which is the lower left corner of the rectangle
		$pdf->SkewX(30, 125, 110);
		$pdf->Rect(125, 100, 40, 10, 'D');
		$pdf->Text(125, 96, 'Skew');
		// Stop Transformation
		$pdf->StopTransform();

		// --- Mirroring horizontally ------------------------------
		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(70, 130, 40, 10, 'D');
		$pdf->Text(70, 126, 'MirrorH');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		// Start Transformation
		$pdf->StartTransform();
		// mirror horizontally with axis of reflection at x-position 70 (left side of the rectangle)
		$pdf->MirrorH(70);
		$pdf->Rect(70, 130, 40, 10, 'D');
		$pdf->Text(70, 126, 'MirrorH');
		// Stop Transformation
		$pdf->StopTransform();

		// --- Mirroring vertically --------------------------------
		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(125, 130, 40, 10, 'D');
		$pdf->Text(125, 126, 'MirrorV');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		// Start Transformation
		$pdf->StartTransform();
		// mirror vertically with axis of reflection at y-position 140 (bottom side of the rectangle)
		$pdf->MirrorV(140);
		$pdf->Rect(125, 130, 40, 10, 'D');
		$pdf->Text(125, 126, 'MirrorV');
		// Stop Transformation
		$pdf->StopTransform();

		// --- Point reflection ------------------------------------
		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(70, 160, 40, 10, 'D');
		$pdf->Text(70, 156, 'MirrorP');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		// Start Transformation
		$pdf->StartTransform();
		// point reflection at the lower left point of rectangle
		$pdf->MirrorP(70, 170);
		$pdf->Rect(70, 160, 40, 10, 'D');
		$pdf->Text(70, 156, 'MirrorP');
		// Stop Transformation
		$pdf->StopTransform();

		// --- Mirroring against a straigth line described by a point (120, 120) and an angle -20°
		$angle = -20;
		$px    = 120;
		$py    = 170;

		// just for visualisation: the straight line to mirror against

		$pdf->SetDrawColor(200);
		$pdf->Line($px - 1, $py - 1, $px + 1, $py + 1);
		$pdf->Line($px - 1, $py + 1, $px + 1, $py - 1);
		$pdf->StartTransform();
		$pdf->Rotate($angle, $px, $py);
		$pdf->Line($px - 5, $py, $px + 60, $py);
		$pdf->StopTransform();

		$pdf->SetDrawColor(200);
		$pdf->SetTextColor(200);
		$pdf->Rect(125, 160, 40, 10, 'D');
		$pdf->Text(125, 156, 'MirrorL');
		$pdf->SetDrawColor(0);
		$pdf->SetTextColor(0);
		//Start Transformation
		$pdf->StartTransform();
		//mirror against the straight line
		$pdf->MirrorL($angle, $px, $py);
		$pdf->Rect(125, 160, 40, 10, 'D');
		$pdf->Text(125, 156, 'MirrorL');
		//Stop Transformation
		$pdf->StopTransform();

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_013.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e014()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 014');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 014', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// IMPORTANT: disable font subsetting to allow users editing the document
		$pdf->setFontSubsetting(false);

		// set font
		$pdf->SetFont('helvetica', '', 10, '', false);

		// add a page
		$pdf->AddPage();

		/*
		It is possible to create text fields, combo boxes, check boxes and buttons.
		Fields are created at the current position and are given a name.
		This name allows to manipulate them via JavaScript in order to perform some validation for instance.
		*/

		// set default form properties
		$pdf->setFormDefaultProp(['lineWidth' => 1, 'borderStyle' => 'solid', 'fillColor' => [255, 255, 200], 'strokeColor' => [255, 128, 128]]);

		$pdf->SetFont('helvetica', 'BI', 18);
		$pdf->Cell(0, 5, 'Example of Form', 0, 1, 'C');
		$pdf->Ln(10);

		$pdf->SetFont('helvetica', '', 12);

		// First name
		$pdf->Cell(35, 5, 'First name:');
		$pdf->TextField('firstname', 50, 5);
		$pdf->Ln(6);

		// Last name
		$pdf->Cell(35, 5, 'Last name:');
		$pdf->TextField('lastname', 50, 5);
		$pdf->Ln(6);

		// Gender
		$pdf->Cell(35, 5, 'Gender:');
		$pdf->ComboBox('gender', 30, 5, [['', '-'], ['M', 'Male'], ['F', 'Female']]);
		$pdf->Ln(6);

		// Drink
		$pdf->Cell(35, 5, 'Drink:');
		//$pdf->RadioButton('drink', 5, array('readonly' => 'true'), array(), 'Water');
		$pdf->RadioButton('drink', 5, [], [], 'Water');
		$pdf->Cell(35, 5, 'Water');
		$pdf->Ln(6);
		$pdf->Cell(35, 5, '');
		$pdf->RadioButton('drink', 5, [], [], 'Beer', true);
		$pdf->Cell(35, 5, 'Beer');
		$pdf->Ln(6);
		$pdf->Cell(35, 5, '');
		$pdf->RadioButton('drink', 5, [], [], 'Wine');
		$pdf->Cell(35, 5, 'Wine');
		$pdf->Ln(6);
		$pdf->Cell(35, 5, '');
		$pdf->RadioButton('drink', 5, [], [], 'Milk');
		$pdf->Cell(35, 5, 'Milk');
		$pdf->Ln(10);

		// Newsletter
		$pdf->Cell(35, 5, 'Newsletter:');
		$pdf->CheckBox('newsletter', 5, true, [], [], 'OK');

		$pdf->Ln(10);
		// Address
		$pdf->Cell(35, 5, 'Address:');
		$pdf->TextField('address', 60, 18, ['multiline' => true, 'lineWidth' => 0, 'borderStyle' => 'none'], ['v' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'dv' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.']);
		$pdf->Ln(19);

		// Listbox
		$pdf->Cell(35, 5, 'List:');
		$pdf->ListBox('listbox', 60, 15, ['', 'item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7'], ['multipleSelection' => 'true']);
		$pdf->Ln(20);

		// E-mail
		$pdf->Cell(35, 5, 'E-mail:');
		$pdf->TextField('email', 50, 5);
		$pdf->Ln(6);

		// Date of the day
		$pdf->Cell(35, 5, 'Date:');
		$pdf->TextField('date', 30, 5, [], ['v' => date('Y-m-d'), 'dv' => date('Y-m-d')]);
		$pdf->Ln(10);

		$pdf->SetX(50);

		// Button to validate and print
		$pdf->Button('print', 30, 10, 'Print', 'Print()', ['lineWidth' => 2, 'borderStyle' => 'beveled', 'fillColor' => [128, 196, 255], 'strokeColor' => [64, 64, 64]]);

		// Reset Button
		$pdf->Button('reset', 30, 10, 'Reset', ['S' => 'ResetForm'], ['lineWidth' => 2, 'borderStyle' => 'beveled', 'fillColor' => [128, 196, 255], 'strokeColor' => [64, 64, 64]]);

		// Submit Button
		$pdf->Button('submit', 30, 10, 'Submit', ['S' => 'SubmitForm', 'F' => 'http://localhost/printvars.php', 'Flags' => ['ExportFormat']], ['lineWidth' => 2, 'borderStyle' => 'beveled', 'fillColor' => [128, 196, 255], 'strokeColor' => [64, 64, 64]]);

		// Form validation functions
		$js = <<<EOD
		function CheckField(name,message) {
			var f = getField(name);
			if(f.value == '') {
				app.alert(message);
				f.setFocus();
				return false;
			}
			return true;
		}
		function Print() {
			if(!CheckField('firstname','First name is mandatory')) {return;}
			if(!CheckField('lastname','Last name is mandatory')) {return;}
			if(!CheckField('gender','Gender is mandatory')) {return;}
			if(!CheckField('address','Address is mandatory')) {return;}
			print();
		}
		EOD;

		// Add Javascript code
		$pdf->IncludeJS($js);

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_014.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e015()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 015');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 015', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// Bookmark($txt, $level=0, $y=-1, $page='', $style='', $color=array(0,0,0))

		// set font
		$pdf->SetFont('times', 'B', 20);

		// add a page
		$pdf->AddPage();

		// set a bookmark for the current position
		$pdf->Bookmark('Chapter 1', 0, 0, '', 'B', [0, 64, 128]);

		// print a line using Cell()
		$pdf->Cell(0, 10, 'Chapter 1', 0, 1, 'L');

		$pdf->SetFont('times', 'I', 14);
		$pdf->Write(0, 'You can set PDF Bookmarks using the Bookmark() method.
		You can set PDF Named Destinations using the setDestination() method.');

		$pdf->SetFont('times', 'B', 20);

		// add other pages and bookmarks

		$pdf->AddPage();
		$pdf->Bookmark('Paragraph 1.1', 1, 0, '', '', [0, 0, 0]);
		$pdf->Cell(0, 10, 'Paragraph 1.1', 0, 1, 'L');

		$pdf->AddPage();
		$pdf->Bookmark('Paragraph 1.2', 1, 0, '', '', [0, 0, 0]);
		$pdf->Cell(0, 10, 'Paragraph 1.2', 0, 1, 'L');

		$pdf->AddPage();
		$pdf->Bookmark('Sub-Paragraph 1.2.1', 2, 0, '', 'I', [0, 0, 0]);
		$pdf->Cell(0, 10, 'Sub-Paragraph 1.2.1', 0, 1, 'L');

		$pdf->AddPage();
		$pdf->Bookmark('Paragraph 1.3', 1, 0, '', '', [0, 0, 0]);
		$pdf->Cell(0, 10, 'Paragraph 1.3', 0, 1, 'L');

		$pdf->AddPage();
		// add a named destination so you can open this document at this page using the link: "example_015.pdf#chapter2"
		$pdf->setDestination('chapter2', 0, '');
		// add a bookmark that points to a named destination
		$pdf->Bookmark('Chapter 2', 0, 0, '', 'BI', [128, 0, 0], -1, '#chapter2');
		$pdf->Cell(0, 10, 'Chapter 2', 0, 1, 'L');
		$pdf->SetFont('times', 'I', 14);
		$pdf->Write(0, 'Once saved, you can open this document at this page using the link: "example_015.pdf#chapter2".');

		$pdf->AddPage();
		$pdf->setDestination('chapter3', 0, '');
		$pdf->SetFont('times', 'B', 20);
		$pdf->Bookmark('Chapter 3', 0, 0, '', 'B', [0, 64, 128]);
		$pdf->Cell(0, 10, 'Chapter 3', 0, 1, 'L');

		$pdf->AddPage();
		$pdf->setDestination('chapter4', 0, '');
		$pdf->SetFont('times', 'B', 20);
		$pdf->Bookmark('Chapter 4', 0, 0, '', 'B', [0, 64, 128]);
		$pdf->Cell(0, 10, 'Chapter 4', 0, 1, 'L');

		$pdf->AddPage();
		$pdf->Bookmark('Chapter 5', 0, 0, '', 'B', [0, 128, 0]);
		$pdf->Cell(0, 10, 'Chapter 5', 0, 1, 'L');
		$txt = 'Example of File Attachment.
		Double click on the icon to open the attached file.';
		$pdf->SetFont('helvetica', '', 10);
		$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

		// attach an external file TXT file
		$pdf->Annotation(20, 50, 5, 5, 'TXT file', ['Subtype' => 'FileAttachment', 'Name' => 'PushPin', 'FS' => 'data/utf8test.txt']);

		// attach an external file
		$pdf->Annotation(50, 50, 5, 5, 'PDF file', ['Subtype' => 'FileAttachment', 'Name' => 'PushPin', 'FS' => 'example_012.pdf']);

		// add a bookmark that points to an embedded file
		// NOTE: prefix the file name with the * character for generic file and with % character for PDF file
		$pdf->Bookmark('TXT file', 0, 0, '', 'B', [128, 0, 255], -1, '*utf8test.txt');

		// add a bookmark that points to an embedded file
		// NOTE: prefix the file name with the * character for generic file and with % character for PDF file
		$pdf->Bookmark('PDF file', 0, 0, '', 'B', [128, 0, 255], -1, '%example_012.pdf');

		// add a bookmark that points to an external URL
		$pdf->Bookmark('External URL', 0, 0, '', 'B', [0, 0, 255], -1, 'http://www.tcpdf.org');

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_015.pdf', 'D');

		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function e016()
	{
		// create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// *** Set PDF protection (encryption) *********************

		/*
		The permission array is composed of values taken from the following ones (specify the ones you want to block):
			- print : Print the document;
			- modify : Modify the contents of the document by operations other than those controlled by 'fill-forms', 'extract' and 'assemble';
			- copy : Copy or otherwise extract text and graphics from the document;
			- annot-forms : Add or modify text annotations, fill in interactive form fields, and, if 'modify' is also set, create or modify interactive form fields (including signature fields);
			- fill-forms : Fill in existing interactive form fields (including signature fields), even if 'annot-forms' is not specified;
			- extract : Extract text and graphics (in support of accessibility to users with disabilities or for other purposes);
			- assemble : Assemble the document (insert, rotate, or delete pages and create bookmarks or thumbnail images), even if 'modify' is not set;
			- print-high : Print the document to a representation from which a faithful digital copy of the PDF content could be generated. When this is not set, printing is limited to a low-level representation of the appearance, possibly of degraded quality.
			- owner : (inverted logic - only for public-key) when set permits change of encryption and enables all other permissions.

		If you don't set any password, the document will open as usual.
		If you set a user password, the PDF viewer will ask for it before displaying the document.
		The master (owner) password, if different from the user one, can be used to get full document access.

		Possible encryption modes are:
			0 = RSA 40 bit
			1 = RSA 128 bit
			2 = AES 128 bit
			3 = AES 256 bit

		NOTES:
		- To create self-signed signature: openssl req -x509 -nodes -days 365000 -newkey rsa:1024 -keyout tcpdf.crt -out tcpdf.crt
		- To export crt to p12: openssl pkcs12 -export -in tcpdf.crt -out tcpdf.p12
		- To convert pfx certificate to pem: openssl pkcs12 -in tcpdf.pfx -out tcpdf.crt -nodes

		*/

		$pdf->SetProtection(['print', 'copy'], '', null, 0, null);

		// Example with public-key
		// To open the document you need to install the private key (tcpdf.p12) on the Acrobat Reader. The password is: 1234
		//$pdf->SetProtection($permissions=array('print', 'copy'), $user_pass='', $owner_pass=null, $mode=1, $pubkeys=array(array('c' => 'file://../config/cert/tcpdf.crt', 'p' => array('print'))));

		// *********************************************************

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 016');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 016', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(['helvetica', '', PDF_FONT_SIZE_MAIN]);
		$pdf->setFooterFont(['helvetica', '', PDF_FONT_SIZE_DATA]);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php'))
		{
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 16);

		// add a page
		$pdf->AddPage();

		// set some text to print
		$txt = <<<EOD
		Encryption Example

		Consult the source code documentation for the SetProtection() method.
		EOD;

		// print a block of text using Write()
		$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

		// ---------------------------------------------------------

		//Close and output PDF document
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_016.pdf', 'D');

		//============================================================+
		// END OF FILE
		//============================================================+
	}
}
