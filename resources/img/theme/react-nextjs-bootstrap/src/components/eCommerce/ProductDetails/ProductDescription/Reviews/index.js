"use client";

import { Card, ProgressBar } from "react-bootstrap";
import Image from "next/image";
import ReviewsForm from "./ReviewsForm";

const Reviews = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 rounded-top-0">
        <Card.Body className="p-4">
          <div className="mw-480 text-center m-auto mb-4">
            <h3 className="fs-24">Feedback</h3>
            <p>
              This is a wider card with supporting text below as a natural
              lead-in to additional content.
            </p>
          </div>

          <div className="row justify-content-center">
            <div className="col-xl-4 col-sm-6 col-md-6">
              <Card className="bg-body-bg border-0 rounded-3 mb-4">
                <Card.Body className="p-4">
                  <ul className="ps-0 mb-2 list-unstyled d-flex gap-2">
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-line text-light fs-20"></i>
                    </li>
                  </ul>
                  <p className="fw-medium">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit.
                  </p>

                  <div className="d-flex align-items-center mt-3">
                    <div className="flex-shrink-0">
                      <Image
                        src="/images/user-34.jpg"
                        className="rounded-circle wh-35"
                        alt="user"
                        width={35}
                        height={35}
                      />
                    </div>
                    <div className="flex-grow-1 ms-3">
                      <h4 className="mb-0 fs-16 fw-medium">Alvarado Turner</h4>
                    </div>
                  </div>
                </Card.Body>
              </Card>
            </div>

            <div className="col-xl-4 col-sm-6 col-md-6">
              <Card className="bg-body-bg border-0 rounded-3 mb-4">
                <Card.Body className="p-4">
                  <ul className="ps-0 mb-2 list-unstyled d-flex gap-2">
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-line text-light fs-20"></i>
                    </li>
                  </ul>
                  <p className="fw-medium">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit.
                  </p>

                  <div className="d-flex align-items-center mt-3">
                    <div className="flex-shrink-0">
                      <Image
                        src="/images/user-35.jpg"
                        className="rounded-circle wh-35"
                        alt="user"
                        width={35}
                        height={35}
                      />
                    </div>
                    <div className="flex-grow-1 ms-3">
                      <h4 className="mb-0 fs-16 fw-medium">Eddie Bryan</h4>
                    </div>
                  </div>
                </Card.Body>
              </Card>
            </div>

            <div className="col-xl-4 col-sm-6 col-md-6">
              <Card className="bg-body-bg border-0 rounded-3 mb-4">
                <Card.Body className="p-4">
                  <ul className="ps-0 mb-2 list-unstyled d-flex gap-2">
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                    <li>
                      <i className="ri-star-fill text-warning fs-20"></i>
                    </li>
                  </ul>
                  <p className="fw-medium">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit.
                  </p>

                  <div className="d-flex align-items-center mt-3">
                    <div className="flex-shrink-0">
                      <Image
                        src="/images/user-36.jpg"
                        className="rounded-circle wh-35"
                        alt="user"
                        width={35}
                        height={35}
                      />
                    </div>
                    <div className="flex-grow-1 ms-3">
                      <h4 className="mb-0 fs-16 fw-medium">Thomas Albart</h4>
                    </div>
                  </div>
                </Card.Body>
              </Card>
            </div>
          </div>

          <h3 className="fs-18 fw-semibold mb-4">Customers Feedback :</h3>

          <Card className="bg-body-bg border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="row align-items-center">
                <div className="col-lg-8">
                    
                  <div className="d-flex align-items-center mb-3">
                    <ul className="pe-4 mb-0 list-unstyled d-flex gap-2">
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                    </ul>

                    <ProgressBar 
                      variant="primary" 
                      now={100} 
                      className="w-100" 
                      style={{
                        height: '5px',  
                      }}
                    />
                    
                    <span className="ms-4">359</span>
                  </div>

                  <div className="d-flex align-items-center mb-3">
                    <ul className="pe-4 mb-0 list-unstyled d-flex gap-2">
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                    </ul>

                    <ProgressBar 
                      variant="primary" 
                      now={80} 
                      className="w-100" 
                      style={{
                        height: '5px',  
                      }}
                    />
 
                    <span className="ms-4">208</span>
                  </div>

                  <div className="d-flex align-items-center mb-3">
                    <ul className="pe-4 mb-0 list-unstyled d-flex gap-2">
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                    </ul>
                    
                    <ProgressBar 
                      variant="primary" 
                      now={70} 
                      className="w-100" 
                      style={{
                        height: '5px',  
                      }}
                    />
 
                    <span className="ms-4">124</span>
                  </div>

                  <div className="d-flex align-items-center mb-3">
                    <ul className="pe-4 mb-0 list-unstyled d-flex gap-2">
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                    </ul>

                    <ProgressBar 
                      variant="primary" 
                      now={60} 
                      className="w-100" 
                      style={{
                        height: '5px',  
                      }}
                    />
 
                    <span className="ms-4">89</span>
                  </div>

                  <div className="d-flex align-items-center mb-0">
                    <ul className="pe-4 mb-0 list-unstyled d-flex gap-2">
                      <li>
                        <i className="ri-star-fill text-warning fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-gray-light fs-20"></i>
                      </li>
                    </ul>

                    <ProgressBar 
                      variant="primary" 
                      now={50} 
                      className="w-100" 
                      style={{
                        height: '5px',  
                      }}
                    />
 
                    <span className="ms-4">4</span>
                  </div>
                </div>

                <div className="col-lg-4">
                  <div className="text-center mt-4 mt-lg-0">
                    <h1 className="fs-40 mb-2">4.28</h1>
                    <ul className="ps-0 mb-3 list-unstyled d-flex gap-2 justify-content-center">
                      <li>
                        <i className="ri-star-fill text-warning fs-30"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-30"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-30"></i>
                      </li>
                      <li>
                        <i className="ri-star-fill text-warning fs-30"></i>
                      </li>
                      <li>
                        <i className="ri-star-line text-light fs-30"></i>
                      </li>
                    </ul>
                    <span className="ms-4">of 3250 Reviews</span>
                  </div>
                </div>
              </div>
            </Card.Body>
          </Card>

          <ReviewsForm />
        </Card.Body>
      </Card>
    </>
  );
};

export default Reviews;
