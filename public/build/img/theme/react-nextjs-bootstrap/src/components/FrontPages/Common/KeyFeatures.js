"use client";

const KeyFeatures = () => {
  return (
    <>
      <div
        className="key-features-area pt-150 pb-125 position-relative z-2" 
      >
        <div className="container">
          <div className="section-title">
            <span className="top-title">
              <span>Key Features</span>
            </span>
            <h2>
              Discover What Sets Us Apart: Highlighted Dashboard Functions
            </h2>
          </div>

          <div className="row justify-content-center">
            <div className="col-lg-4 col-md-6">
              <div className="key-features-single-item">
                <i className="material-symbols-outlined wh-87 bg-primary bg-opacity-25 d-inline-block text-primary">
                  stacks
                </i>

                <h3>Real-Time Updates</h3>
                <p>
                  Provide real-time updates and notifications to keep users
                  informed about important events, changes, or updates within
                  the system.
                </p>
              </div>
            </div>

            <div className="col-lg-4 col-md-6">
              <div className="key-features-single-item">
                <i className="material-symbols-outlined wh-87 bg-primary-div bg-opacity-25 d-inline-block text-primary-div">
                  source
                </i>
                <h3>Quality Code</h3>
                <p>
                  These features include adherence to coding standards, robust
                  error handling mechanisms, efficient algorithms, scalability,
                  maintainability, and readability.
                </p>
              </div>
            </div>

            <div className="col-lg-4 col-md-6">
              <div className="key-features-single-item">
                <i className="material-symbols-outlined wh-87 bg-danger bg-opacity-25 d-inline-block text-danger">
                  support_agent
                </i>

                <h3>24/7 Customer Support</h3>
                <p>
                  Our 24/7 customer support is dedicated to providing
                  round-the-clock assistance, ensuring that help is always
                  available whenever our customers need it.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default KeyFeatures;
