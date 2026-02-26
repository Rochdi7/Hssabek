"use client";

import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";
import Profile from "./Profile";

const PropertyOverview = () => {
  return (
    <>
      <Row>
        <Col lg={8}>
          <Card className="border-0 rounded-3 bg-white mb-4">
            <Card.Body className="p-4">
              <div className="position-relative mb-4">
                <Image
                  src="/images/property-5.png"
                  alt="property"
                  width={1240}
                  height={600}
                />
                <span className="text-white bg-success d-inline-block fs-12 px-2 rounded-2 position-absolute top-0 end-0 mt-3 me-3">
                  Sale
                </span>
              </div>

              <h3 className="mb-3 text-danger">$250,000</h3>

              <div className="d-flex align-items-center mb-3">
                <span className="material-symbols-outlined fs-20 text-primary">
                  location_on
                </span>
                <span className="ms-1">Largo Prazeres 32</span>
              </div>

              <div className="border-top border-bottom py-2 mb-4 d-flex justify-content-between align-items-center gap-2 mb-4">
                <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2 gap-md-4">
                  <li>
                    <div className="d-flex align-items-center">
                      <span className="material-symbols-outlined fs-18 text-danger">
                        bed
                      </span>
                      <span className="ms-2">6 Bed</span>
                    </div>
                  </li>
                  <li>
                    <div className="d-flex align-items-center">
                      <span className="material-symbols-outlined fs-18 text-danger">
                        bathtub
                      </span>
                      <span className="ms-2">5 Bath</span>
                    </div>
                  </li>
                  <li>
                    <div className="d-flex align-items-center">
                      <span className="material-symbols-outlined fs-18 text-danger">
                        square_foot
                      </span>
                      <span className="ms-2">1800 qft</span>
                    </div>
                  </li>
                </ul>

                <div className="d-flex align-items-center">
                  <div className="d-flex gap-1">
                    <i className="ri-star-line text-danger"></i>
                    <i className="ri-star-line text-danger"></i>
                    <i className="ri-star-line text-danger"></i>
                    <i className="ri-star-line text-danger"></i>
                    <i className="ri-star-line text-danger"></i>
                  </div>
                  <span className="ms-2">4.9(Review)</span>
                </div>
              </div>

              <h3 className="mb-3">Description</h3>
              <p>
                This stunning 4-bedroom, 3-bathroom residence offers 2,000
                square feet of modern living space in a quiet, family-friendly
                neighborhood. Built in 2010, the home features a spacious layout
                with a bright and airy living room, perfect for relaxation or
                entertaining guests. The beautifully updated kitchen includes
                granite countertops and stainless steel appliances, ideal for
                home cooking.
              </p>
              <p className="mb-md-5 mb-4">
                The master suite boasts an en-suite bathroom and plenty of
                closet space, while the additional bedrooms are perfect for
                family or guests. Step outside to your private backyard,
                complete with a deck for outdoor dining and a well-maintained
                garden area.
              </p>

              <h3 className="mb-3">Features</h3>

              <ul className="ps-0 mb-md-5 mb-4 list-unstyled list-last-child">
                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Spacious living room with natural light</span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Modern kitchen with granite countertops</span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Master bedroom with en-suite bathroom</span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Private backyard with deck</span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>2-car garage</span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Central heating and air conditioning</span>
                </li>
              </ul>

              <h3 className="mb-3">Neighborhood</h3>
              <ul className="ps-0 mb-md-5 mb-4 list-unstyled list-last-child">
                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>
                    Located in a quiet residential area with nearby parks
                  </span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>
                    Close to schools, shopping centers, and public
                    transportation
                  </span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Safe and family-friendly community</span>
                </li>
              </ul>

              <h3 className="mb-3">Location</h3>
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387194.0622236789!2d-74.30932477148002!3d40.69701929469058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1730886027412!5m2!1sen!2sbd"
                className="d-block w-100 rounded-3 mb-md-5 mb-4"
                style={{ height: "250px" }}
              ></iframe>

              <h3 className="mb-3">Recent Renovations</h3>
              <ul className="ps-0 mb-0 list-unstyled list-last-child">
                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>New roof installed in 2023</span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Fresh paint throughout the interior in 2024</span>
                </li>

                <li className="mb-2 d-flex align-items-center gap-2">
                  <span
                    className="d-inline-block rounded-circle"
                    style={{
                      width: "7px",
                      height: "7px",
                      backgroundColor: "#605DFF",
                    }}
                  ></span>
                  <span>Updated appliances in the kitchen</span>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col lg={4}>
          <Profile />
        </Col>
      </Row>
    </>
  );
};

export default PropertyOverview;
