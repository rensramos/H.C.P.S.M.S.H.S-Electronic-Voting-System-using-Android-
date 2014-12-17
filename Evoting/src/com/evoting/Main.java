package com.evoting;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.view.Menu;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;

public class Main extends Activity {

	SharedPreferences preferences;
	public static final String PrefFile = "Prefs";

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		requestWindowFeature(Window.FEATURE_NO_TITLE);
		getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
				WindowManager.LayoutParams.FLAG_FULLSCREEN);
		setContentView(R.layout.main);

		preferences = getSharedPreferences("PrefFile", MODE_PRIVATE);
		SharedPreferences.Editor editor = preferences.edit();
		editor.clear();
		editor.commit();
	}

	public void showLogin(View clickedButton) {
		Intent activityIntent = new Intent(this, Login.class);
		startActivity(activityIntent);
		finish();

	}

	public void showAbout(View clickedButton) {
		Intent activityIntent = new Intent(this, About.class);
		startActivity(activityIntent);
		finish();
	}

	public void showManual(View clickedButton) {
		Intent activityIntent = new Intent(this, Manual.class);
		startActivity(activityIntent);
		finish();
	}

	public void showTips(View clickedButton) {
		Intent activityIntent = new Intent(this, Tips.class);
		startActivity(activityIntent);
		finish();
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public void onBackPressed() {
		finish();
	}

}
