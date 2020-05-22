%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <h1>Try out some form validation</h1>
    
    <form action="@@index@@" method="post">
      <div class="form-group">
        <label for="required_field">A required field</label>
        <input type="text" min="1" id="required_field" name="form[required_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['required_field'])}}" />
        <small class="text-danger">{{$this->value($errors['required_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="phone_field">A phone number</label>
        <input type="text" min="1" id="phone_field" name="form[phone_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['phone_field'])}}" />
        <small class="text-danger">{{$this->value($errors['phone_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="email_field">An email address</label>
        <input type="text" min="1" id="email_field" name="form[email_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['email_field'])}}" />
        <small class="text-danger">{{$this->value($errors['email_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="integer_field">An integer</label>
        <input type="text" min="1" id="integer_field" name="form[integer_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['integer_field'])}}" />
        <small class="text-danger">{{$this->value($errors['integer_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="float_field">A floating point number</label>
        <input type="text" min="1" id="float_field" name="form[float_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['float_field'])}}" />
        <small class="text-danger">{{$this->value($errors['float_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="money_field">An amount of money</label>
        <input type="text" min="1" id="money_field" name="form[money_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['money_field'])}}" />
        <small class="text-danger">{{$this->value($errors['money_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="password1_field">A strong password</label>
        <input type="text" min="1" id="password1_field" name="form[password1_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['password1_field'])}}" />
        <small class="text-danger">{{$this->value($errors['password1_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="password2_field">Must match above password</label>
        <input type="text" min="1" id="password2_field" name="form[password2_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['password2_field'])}}" />
        <small class="text-danger">{{$this->value($errors['password2_field'])}}</small>
      </div>
      <div class="form-group">
        <label for="between_field" class="control-label">Must be between 25 and 555</label>
        <input type="text" min="1" id="between_field" name="form[between_field]" class="form-control" placeholder="Enter something" value="{{$this->value($form['between_field'])}}" />
        <small class="text-danger">{{$this->value($errors['between_field'])}}</small>
      </div>
      <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" onclick="get('@@index@@')">Cancel</button>
      </div>
    </form>
  </div>
</div>
          
%% views/footer.html %% 