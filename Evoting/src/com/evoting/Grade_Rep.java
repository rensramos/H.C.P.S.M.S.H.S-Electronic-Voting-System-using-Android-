package com.evoting;

import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.evoting.Grade_Rep.LoadComments;

import android.app.Activity;
import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.AdapterView.OnItemClickListener;

public class Grade_Rep extends ListActivity{

	private boolean isConnected;
	private TextView cName;
	private TextView cID;
	TextView position;
	
	// Progress Dialog
	private ProgressDialog pDialog;
	
	JSONParser jParser = new JSONParser();
	
	private static final String CANDIDATES_URL = "http://192.168.1.225/Electrovots/Android/grade_rep.php";
	
	// JSON IDS:
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_NAME = "name";
	private static final String TAG_POSITION = "position";
	private static final String TAG_PARTY_LIST = "party_list";
	private static final String TAG_CANDIDATES = "candidates";
	private static final String TAG_CANDIDATE_ID = "candidate_id";
	private static final String TAG_PHOTO = "photo";
	// it's important to note that the message is both in the parent branch of
	// our JSON tree that displays a "Candidates Available" or a "No Candidates Available" message,
	// and there is also a message for each individual post, listed under the "posts" 
	// category, that displays what the user typed as their message.
	
	// An array of all of our comments
	private JSONArray mCandidates = null;
	// manages all of our data(candidates) in a list.
	private ArrayList<HashMap<String, Object>> mCandidateList;
	
	//Storing of data
	SharedPreferences preferences;
	public static final String PrefFile = "Prefs";
	public static final String cGrade_Rep = "cGrade_Rep";
	public static final String cGrade_RepID = "cGrade_RepID";
	public static final String cGrade_RepSelected = "cGrade_RepSelected";
	public static final String Voter_Year = "Voter_Year";
	public static final String cVote_StraightSelected = "cVote_StraightSelected";
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
    	setContentView(R.layout.position_container);
	    
    	preferences = getSharedPreferences("PrefFile", MODE_PRIVATE);
		boolean bgrade_rep = preferences.getBoolean(cGrade_RepSelected, false);
		String grade_rep = preferences.getString(cGrade_Rep, "None");
		String id = preferences.getString(cGrade_RepID, "00");
		String voter_year = preferences.getString(Voter_Year, "0");
    	
    	cName = (TextView) findViewById(R.id.textViewCanName);
    	cID = (TextView) findViewById(R.id.textViewCID);
    	ImageView submit = (ImageView) findViewById(R.id.msubmit);
    	position = (TextView) findViewById(R.id.position);
    	
    	int grade = Integer.parseInt(voter_year)+1;
    	position.setText("Grade " +grade + " Representative");
    	
    	isConnected = true;
    	
    	if(bgrade_rep){
    		submit.setVisibility(View.VISIBLE);
    		cName.setText(grade_rep);
    		cID.setText(id);
    	}
	}

	@Override
	protected void onResume() {
		// TODO Auto-generated method stub
		super.onResume();
		// loading the candidates via AsyncTask
		new LoadComments().execute();
	}
	
	/**
	 * Retrieves recent data value(candidates) from the server.
	 */
	public void updateJSONdata() {

		// Instantiate the arraylist to contain all the JSON data. we are going to use a bunch of key-value pairs, referring
		// to the json element name, and the content.
		mCandidateList = new ArrayList<HashMap<String, Object>>();

		

		try {
			//for identifying grade
			String voter_year = preferences.getString(Voter_Year, "0");
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("gradeyear", voter_year));
			
			JSONObject json = jParser.makeHttpRequest(CANDIDATES_URL, "POST",
					params);
			// mCandidates will tell us how many data (candidates) are available
			mCandidates = json.getJSONArray(TAG_CANDIDATES);

			// looping through all posts according to the json object returned
			for (int i = 0; i < mCandidates.length(); i++) {
				JSONObject c = mCandidates.getJSONObject(i);

				// gets the content of each tag
				String position = c.getString(TAG_POSITION);
				String party_list = c.getString(TAG_PARTY_LIST);
				if(party_list.equals("null")){
					party_list="--No Party List--";
				}
				String name = c.getString(TAG_NAME);
				//String photo = c.getString(TAG_PHOTO);
				String cid = c.getString(TAG_CANDIDATE_ID);
				String photoURL = "http://192.168.1.225/Electrovots"+c.getString(TAG_PHOTO);
				URL uPhoto = new URL(photoURL);
				
				Bitmap bitmap = BitmapFactory.decodeStream(uPhoto.openStream());
				
				// creating new HashMap
				HashMap<String, Object> map = new HashMap<String, Object>();

				map.put(TAG_POSITION, position);
				map.put(TAG_PARTY_LIST, party_list);
				map.put(TAG_NAME, name);
				map.put(TAG_PHOTO, bitmap);
				map.put(TAG_CANDIDATE_ID, cid);

				// adding HashList to ArrayList
				mCandidateList.add(map);

				// our JSON data is up to date same with our arraylist
			}

		} catch (JSONException e) {
			isConnected = false;
			e.printStackTrace();
		} catch (MalformedURLException e){
			// TODO Auto-generated catch block
			isConnected = false;
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			isConnected = false;
			e.printStackTrace();
		}
	}
	
	

	/**
	 * Inserts the parsed data into the listview.
	 */
	private void updateList() {
		
		//For a ListActivity we need to set the List Adapter, and in order to do
		//that, we need to create a ListAdapter.  This SimpleAdapter,
		//will utilize our updated Hashmapped ArrayList, 
		//use our vote_content xml template for each item in our list,
		//and place the appropriate info from the list to the
		//correct GUI id.  Order is important here.
		SimpleAdapter adapter = 
				new SimpleAdapter(Grade_Rep.this, mCandidateList, R.layout.position_content, 
				new String[] { TAG_PHOTO, TAG_POSITION, TAG_PARTY_LIST, TAG_NAME ,TAG_CANDIDATE_ID}, 
				new int[] { R.id.imageViewto, R.id.position, R.id.party_list, R.id.name, R.id.cid});
		
		// I shouldn't have to comment on this one:
		adapter.setViewBinder(new MyViewBinder());
		setListAdapter(adapter);
		
		ListView lv = getListView();	
		lv.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				
					TextView name = (TextView) view.findViewById(R.id.name);
					TextView cid = (TextView) view.findViewById(R.id.cid);
					ImageView iv = (ImageView) view.findViewById(R.id.imageViewto);
					ImageView submit = (ImageView) findViewById(R.id.msubmit);
					
					submit.setVisibility(View.VISIBLE);
					cID.setText(cid.getText().toString());
					cName.setText(name.getText().toString());
					//iv.setImageResource(R.drawable.backicon);
					
					//This is for testing
					/*Toast toast = Toast.makeText(Grade8_Rep.this, "hello"+name.getText().toString(), Toast.LENGTH_SHORT);
					toast.setGravity(Gravity.CENTER, 0, 0);
					toast.show();*/
			}
		});
	}

	public class LoadComments extends AsyncTask<Void, Void, Boolean> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(Grade_Rep.this);
			pDialog.setMessage("Loading Candidates...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}
		
		@Override
		protected Boolean doInBackground(Void... arg0) {
			updateJSONdata();
			return null;
		}

		@Override
		protected void onPostExecute(Boolean result) {
			super.onPostExecute(result);
			pDialog.dismiss();
			if (isConnected == false){
				Toast toast = Toast.makeText(Grade_Rep.this, "Cannot connect to Server!",Toast.LENGTH_LONG);
				toast.setGravity(Gravity.CENTER, 0, 0);
				toast.show();
			}
			else{
				updateList();
			}
		}
	}
	
	public void submit(View v){
		
		SharedPreferences.Editor edit = preferences.edit();
		edit.putString(cGrade_Rep, cName.getText().toString());
		edit.putString(cGrade_RepID, cID.getText().toString());
		edit.putBoolean(cGrade_RepSelected, true);
		edit.putBoolean(cVote_StraightSelected, false);
		edit.commit();
		
		String a=preferences.getString("cGrade_Rep", "");
		String b=preferences.getString("cGrade_RepID", "");
		
		Intent activityIntent = new Intent(this, Vote.class);
	    startActivity(activityIntent);
	    finish();
	    
	    //This is for testing
		/*Toast toast = Toast.makeText(Grade_Rep.this, a+b, Toast.LENGTH_SHORT);
		toast.setGravity(Gravity.CENTER, 0, 0);
		toast.show();*/
	}
	
	@Override
	public void onBackPressed(){
		Intent activityIntent = new Intent(this, Vote.class);
		startActivity(activityIntent);
		finish();
	}
}
