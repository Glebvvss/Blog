<div id="page-manager">
  <div class="component-body">
    <div class="header-component">
      <h3 class="text-center">Pages</h3>

      <div>
        <p class="text-center">
          @foreach($pageList as $page)
          <a href="form-control page-list">{{ ucwords($page->page_name) }}</a>
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