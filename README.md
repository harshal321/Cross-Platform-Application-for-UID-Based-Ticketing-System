# Cross-Platform-Application-for-UID-Based-Ticketing-System

# Title of the Project: Cross Platform Application for UID Based Ticketing System

# Group Members:
1) Harshal Patil
2) Shreyas Sawant
3) Piyush Kurkure

# Description:
We have seen an increase in the use of public transport due to globalization and an increase in the rate of fuel. Due to this higher use of public transport, vending and managing the ticketsis becoming a complex task. As many passengers are traveling ticketless, these numbers are increasing daily. Apart from this, in current manual ticketing systems, passengers and the conductor have to bother about giving the exact change. The current process of using smar cards is also a massive problem as anyone can use the smart card due to a lack of verification. Thus, this proposed system of UID-based smart ticketing uses fingerprints instead of the
traditional paper ticketing and smart card system. In some places for public transport, we have ticket vending machines to buy tickets. For this, the passenger must also have a good knowledge of that technology or a minimal understanding of the system to use those, as these machines are not user-friendly. This system is highly secured as forgery cannot be made for biometrics. The fingerprints of the user are stored in a database. This will make buying tickets more accessible as the project’s main idea is to eliminate the human effort and provide comfort to the users.

# Proposed System:
Firstly, all the details of the user are registered in a database. Two fingerprints left and
right of each user is stored in the database. Then we decide the ticket fares for all possible
sources to destinations and store them in a database with three columns: Source stop ID,
Destination stop ID, and Fare. We have two doors in a bus, one door for entry and the
other for exit. When a passenger enters a bus, he should scan his finger. If the green
led glows, the passenger is allowed to proceed. After the fingerprint is validated with the
database, the bus stop ID will be stored. When the driver opens and closes the bus’s door
at that time, the bus stop ID will keep on increasing. This keeps track of the following
upcoming stop for the bus. The same procedure done at boarding is followed while exiting
the bus. After a successful Fingerprint scan passenger can leave the bus. The system
takes both locations entries, i.e., at Boarding time and at exiting time, then the fare is
calculated using a database, which has a source stop ID, destination stop ID, and fare. All
these records get maintained in the database. The amount corresponding to the distance
traveled by the passenger is deducted from a connected account, and money is then added
into the Account of PTS (Public Transport System). Here we use the Paytm API, which is
our payment gateway. This will help the users to recharge the e-wallet, and also, the fare
deduction from the user’s wallet after travel will be managed by this payment gateway. As
the Paytm Payment Gateway process keeps your business safe and PCI-DSS compliant with
128-bit encryption, all the payments through this system will be secured. After the money is
successfully transferred to the PTS wallet, the E-ticket will be sent to Passengers by E-Mail.
The E-mail will have the following details: entry stop, exit stop, and passenger id. The user
can check the last ten transactions he traveled and recharge his e-wallet. The admin can
control many features of this system. He can register a new user, modify the user’s profile,
view travel history, add bus stop ID to the database and view the feedback.

# Project Implementation:

# Hardware Setup.
We can see the hardware setup for this system. This is the model that will be
fitted in the bus at the front and exit doors. The fingerprint scanner will scan the biometrics
and send the details to the cloud to validate the data.

![hardware](https://user-images.githubusercontent.com/18300814/167291360-811fcad0-19cb-4932-9f55-c47d88cff254.jpg)

# Home Page
The Home Page should be user friendly and the navigation panel must be quite visible so
that a user can go through the various pages after clicking on the buttons. The Navigation
bar should contain all the tabs what our service offers.

![Home Page](https://user-images.githubusercontent.com/18300814/167291496-48e3fbaa-1d61-43a2-9f6e-d04387de77ac.PNG)



# Login Page
This is a login page a web page or an entry page to a website that requires user identification
and authentication, regularly performed by entering a username and password combination.
Logins will provide customer access to an entire site or part of a website.

![login](https://user-images.githubusercontent.com/18300814/167291547-cb88632a-e487-4e95-9272-f7f3a32b67b8.PNG)

# Registration Page
Here the user will register himself on the web portal to use the ticketing service. He will be
asked to enter all the details like his name,mobile number, username, password, address so
that when he try’s to login on our website our database can fetch the detail of the user.

![register](https://user-images.githubusercontent.com/18300814/167291573-1e31734f-f73c-413b-9661-6430b3e681b1.PNG)

# User Dashboard
After the user logins to the site he will be able to see his last travel history having the
locations, timing , dates and also he will be able to how see how much fare was deducted
when and for which journey. The user can also add balance to his wallet by selecting add
balance button on the page, he will be redirected to the payment page to complete the
transaction.

![user dashboard](https://user-images.githubusercontent.com/18300814/167291607-c8273b23-9fa0-469c-b601-86a4d197a1da.PNG)

# Add Balance
The user can add balance or recharge his wallet by clicking on the add balance button. This
works as a e-wallet of a user.

![addrecharge](https://user-images.githubusercontent.com/18300814/167291614-7615f49d-ff91-43fa-9558-14f3b03defda.PNG)

# Payment Gateway
If the user want to recharge his wallet he will be redirected to the payment page where he will
complete his transaction by selecting the preferred mode of payment. We have intergrated
PAYTM payment gateway API here to handle payments on our website.

![paymentpage](https://user-images.githubusercontent.com/18300814/167291627-18d01a23-cf13-4413-8254-7c30d8525b46.PNG)

# Transaction History
The user can check his last transaction history and available balance in the user dashboard
once he logins or finishes a transaction.

![trnxhistory](https://user-images.githubusercontent.com/18300814/167291635-797f745d-bfed-4462-b04d-5325d1708e18.PNG)

# Admin Dashboard
The Admin has a full control over the system. He has many authorities like deleting the
customer, adding new customer, checking the user’s last transactions. Apart from all this
he can add new bus stops and delete bus stops on the routes. He can also modify the fares
between the stops. Admin dashboard is the complete control panel of the system we can
say.

![Admindashboard](https://user-images.githubusercontent.com/18300814/167291640-f10a77f2-0a1b-498b-87b8-5a333b565e19.PNG)

# Receving SMS on completing the Journey
After the user completes his journey a SMS containing the details about the fare and bus
stops we can also say it has the e-ticket will be sent to the user’s mobile number.

![Journey Sms](https://user-images.githubusercontent.com/18300814/167291642-8ce372e1-fb81-42c4-a518-dcb0fd27d4ab.PNG)

