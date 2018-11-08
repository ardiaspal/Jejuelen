@extends('layouts.app')
@section('title', 'Transaksi')
@section('content')

<div class="grup-pembayaran">
	<h2>#Pembayaran Via Jejuelen</h2>
	
	<div class="grup-all-data-pembayaran">
		<div class="rekening-pembayaran">
			<h3>Rekening Jejuelen</h3>
			<h2>8282-3424-3423-4322</h2>
			<p>Atas Nama : Jejuelen</p>
		</div>
		<div class="total-data-pembayaran">
			<p>Total Pembayaran</p>
			@if (empty($transaksi->totalPembayaran))
			<h1>Rp 0,-</h1>
			@else
			<h1>Rp {{number_format($transaksi->totalPembayaran)}},-</h1>
			@endif
		</div>
		@if (empty($transaksi->totalPembayaran))
		
		@else
		@if ($transaksi->totalPembayaran>0)
		<div class="form-upload-bukti">
			<h2>Konfirmasi Pembayaran</h2>
			<form action="/pembayaran/upload" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="email">No Rekening</label>
					<input type="text" autocomplete="off" class="form-control creditCardText" id="credit-card" name="norekening" placeholder="xxxx-xxxx-xxxx-xxxx">
				</div>
				<div class="form-group">
					<label for="">Bukti Transfer</label>
					<input type="file" class="form-control" name="image">
				</div>
				{{ csrf_field() }}
				<button type="submit">Upload</button>
			</form>
		</div>
		@endif
		@endif
	</div>

</div>

@section('script')
<script type="text/javascript">
// 	$('.creditCardText').keyup(function() {
//   var foo = $(this).val().split("-").join(""); // remove hyphens
//   if (foo.length > 0) {
//   	foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
//   }
//   $(this).val(foo);
// });

input_credit_card = function(input)
{
	var format_and_pos = function(char, backspace)
	{
		var start = 0;
		var end = 0;
		var pos = 0;
		var separator = "-";
		var value = input.value;

		if (char !== false)
		{
			start = input.selectionStart;
			end = input.selectionEnd;

            if (backspace && start > 0) // handle backspace onkeydown
            {
            	start--;

            	if (value[start] == separator)
            		{ start--; }
            }
            // To be able to replace the selection if there is one
            value = value.substring(0, start) + char + value.substring(end);

            pos = start + char.length; // caret position
        }

        var d = 0; // digit count
        var dd = 0; // total
        var gi = 0; // group index
        var newV = "";
        var groups = /^\D*3[47]/.test(value) ? // check for American Express
        [4, 6, 5] : [4, 4, 4, 4];

        for (var i = 0; i < value.length; i++)
        {
        	if (/\D/.test(value[i]))
        	{
        		if (start > i)
        			{ pos--; }
        	}
        	else
        	{
        		if (d === groups[gi])
        		{
        			newV += separator;
        			d = 0;
        			gi++;

        			if (start >= i)
        				{ pos++; }
        		}
        		newV += value[i];
        		d++;
        		dd++;
        	}
            if (d === groups[gi] && groups.length === gi + 1) // max length
            	{ break; }
        }
        input.value = newV;

        if (char !== false)
        	{ input.setSelectionRange(pos, pos); }
    };

    input.addEventListener('keypress', function(e)
    {
    	var code = e.charCode || e.keyCode || e.which;

        // Check for tab and arrow keys (needed in Firefox)
        if (code !== 9 && (code < 37 || code > 40) &&
        // and CTRL+C / CTRL+V
        !(e.ctrlKey && (code === 99 || code === 118)))
        {
        	e.preventDefault();

        	var char = String.fromCharCode(code);

            // if the character is non-digit
            // OR
            // if the value already contains 15/16 digits and there is no selection
            // -> return false (the character is not inserted)

            if (/\D/.test(char) || (this.selectionStart === this.selectionEnd &&
            	this.value.replace(/\D/g, '').length >=
            (/^\D*3[47]/.test(this.value) ? 15 : 16))) // 15 digits if Amex
            {
            	return false;
            }
            format_and_pos(char);
        }
    });
    
    // backspace doesn't fire the keypress event
    input.addEventListener('keydown', function(e)
    {
        if (e.keyCode === 8 || e.keyCode === 46) // backspace or delete
        {
        	e.preventDefault();
        	format_and_pos('', this.selectionStart === this.selectionEnd);
        }
    });
    
    input.addEventListener('paste', function()
    {
        // A timeout is needed to get the new value pasted
        setTimeout(function(){ format_and_pos(''); }, 50);
    });
    
    input.addEventListener('blur', function()
    {
    	// reformat onblur just in case (optional)
    	format_and_pos(this, false);
    });
};

input_credit_card(document.getElementById('credit-card'));
</script>
@endsection

@endsection