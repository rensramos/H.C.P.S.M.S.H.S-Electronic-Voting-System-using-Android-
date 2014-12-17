package com.evoting;
import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ScrollView;

public class Manual extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
			
		  requestWindowFeature(Window.FEATURE_NO_TITLE);
	        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, 
	        WindowManager.LayoutParams.FLAG_FULLSCREEN);
	    	setContentView(R.layout.header_container);
	    	
	    	
	    	
	    	
	    	ScrollView scrollable_layout = (ScrollView) findViewById(R.id.scrollableContents);
			getLayoutInflater().inflate(R.layout.manual_content, scrollable_layout);
	    	
	    	
	    	
	}
	
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	@Override
	public void onBackPressed(){
		Intent activityIntent = new Intent(this, Main.class);
	    startActivity(activityIntent);
	    finish();
	}

}
