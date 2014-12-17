package com.evoting;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Gravity;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ImageView;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import com.evoting.JSONParser;
import com.evoting.Login;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Login extends Activity implements OnClickListener {

	boolean isConnected;
	
	private EditText user, pass;
	private ImageView mProceed;
	// Progress Dialog
	private ProgressDialog pDialog;
	// JSON parser class
	JSONParser jsonParser = new JSONParser();
	// php login script location:

	// testing on Emulator:
	private static final String LOGIN_URL = "http://192.168.1.225/Electrovots/Android/login.php";

	// testing from a real server:
	// private static final String LOGIN_URL =
	// "http://www.mybringback.com/webservice/login.php";

	// JSON element ids from repsonse of php script:
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_MESSAGE = "message";
	private static final String TAG_VOTER_ID = "voter_id";
	private static final String TAG_VOTER_YEAR = "voter_gradeYear";
	
	//Storing of data
	SharedPreferences preferences;
	public static final String PrefFile = "Prefs";
	public static final String Voter_Username = "Voter_Username";
	public static final String Voter_ID = "Voter_ID";
	public static final String Voter_Year = "Voter_Year";

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		requestWindowFeature(Window.FEATURE_NO_TITLE);
		getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
				WindowManager.LayoutParams.FLAG_FULLSCREEN);
		setContentView(R.layout.login);
		
		preferences = getSharedPreferences("PrefFile", MODE_PRIVATE);

		isConnected = true;
		
		user = (EditText) findViewById(R.id.name);
		pass = (EditText) findViewById(R.id.password);
		mProceed = (ImageView) findViewById(R.id.Proceed);

		// register listeners
		mProceed.setOnClickListener(this);

	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public void onClick(View v) {
		// TODO Auto-generated method stub
		switch (v.getId()) {
		case R.id.Proceed:
			new AttemptLogin().execute();
			break;
		/*
		 * case R.id.register: Intent i = new Intent(this, Register.class);
		 * startActivity(i); break;
		 */
		default:
			break;
		}
	}

	class AttemptLogin extends AsyncTask<String, String, String> {

		@Override
		protected void onPreExecute() {			
			super.onPreExecute();
			pDialog = new ProgressDialog(Login.this);
			pDialog.setMessage("Attempting login...");
			pDialog.setProgressStyle(pDialog.STYLE_SPINNER);
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(false);
			pDialog.show();		
		}

		@Override
		protected String doInBackground(String... args) {
			// TODO Auto-generated method stub
			// Check for success tag
			int success;
			String username = user.getText().toString();
			String password = pass.getText().toString();
			try {
				// Building Parameters
				List<NameValuePair> params = new ArrayList<NameValuePair>();
				params.add(new BasicNameValuePair("username", username));
				params.add(new BasicNameValuePair("password", password));

				Log.d("request!", "starting");
				// getting product details by making HTTP request
				JSONObject json = jsonParser.makeHttpRequest(LOGIN_URL, "POST",
						params);

				// check your log for json response
				Log.d("Login attempt", json.toString());

				// json success tag
				success = json.getInt(TAG_SUCCESS);
				if (success == 1) {
					Log.d("Login Successful!", json.toString());
					// save user data
					String voter_id = json.getString(TAG_VOTER_ID);
					String voter_year = json.getString(TAG_VOTER_YEAR);
					
					SharedPreferences.Editor edit = preferences.edit();
					edit.putString(Voter_Username, username);
					edit.putString(Voter_ID, voter_id);
					edit.putString(Voter_Year, voter_year);
					edit.commit();

					Intent i = new Intent(Login.this, Vote.class);
					finish();
					startActivity(i);
					return json.getString(TAG_MESSAGE);
				} else {
					Log.d("Login Failure!", json.getString(TAG_MESSAGE));
					return json.getString(TAG_MESSAGE);
				}
			}
			catch (Exception e){
				isConnected=false;
				e.printStackTrace();
				
			}
			
			
			return null;

		}

		protected void onPostExecute(String file_url) {
			// dismiss the dialog once product deleted
			pDialog.dismiss();
			if (file_url != null) {
				Toast toast = Toast.makeText(Login.this, file_url,Toast.LENGTH_LONG);
				toast.setGravity(Gravity.CENTER, 0, 0);
				toast.show();
			}
			if (isConnected == false){
				Toast toast = Toast.makeText(Login.this, "Cannot connect to Server!",Toast.LENGTH_LONG);
				toast.setGravity(Gravity.CENTER, 0, 0);
				toast.show();
			}
		}

	}

	public void showMain(View clickedButton) {
		Intent activityIntent = new Intent(this, Main.class);
		startActivity(activityIntent);
		finish();
	}
	
	@Override
	public void onBackPressed(){
		Intent activityIntent = new Intent(this, Main.class);
	    startActivity(activityIntent);
	    finish();
	}
	
	
}
