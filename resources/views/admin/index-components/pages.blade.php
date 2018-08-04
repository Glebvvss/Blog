<div id="page-manager">
  <div>
    <div style="background-color: #0069d9; border: none; border-radius: 5px;">
      <h3 class="text-center" style="color: white;">Pages</h3>

      <div>
      <p class="text-center">
        @foreach($pageList as $page)
        <a href="form-control" style="color: white; margin: 20px;">{{ ucwords($page->page_name) }}</a>
        @endforeach
      </p>
      </div>
    </div>

    <form>
      @foreach($pageVars as $varName => $var)
      <div class="form-group">
        <label>{{ varNameToLabelFormat($varName) }}</label>
        <input type="{{ $var['type'] }}" class="form-control" value="{{ $var['value'] }}">
      </div>
      @endforeach
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>