"use client";

import { Row, Col, Card } from "react-bootstrap";
import PropertyStatus from "./PropertyStatus";
import ClientFeedbacks from "./ClientFeedbacks";
import Profile from "./Profile"; 

const PropertyOverview = () => {
  return (
    <>
      <Row>
        <Col lg={8}>
          <Card className="border-0 rounded-3 bg-white mb-4">
            <Card.Body className="p-4">
              <h3 className="mb-3">About Johnson</h3>
              <p>
                With over a decade of experience in the real estate market, John
                Smith has built a reputation for his in-depth knowledge of
                residential and commercial properties. His commitment to client
                satisfaction, combined with an extensive network, ensures a
                smooth and efficient process, whether buying or selling.
              </p>
              <p className="mb-md-5 mb-4">
                John’s approach focuses on understanding each client’s unique
                needs and goals, providing tailored advice and insights. His
                market expertise and negotiation skills consistently deliver the
                best outcomes, helping clients make informed real estate
                decisions.
              </p>

              {/* PropertyStatus */}
              <PropertyStatus />

              <h3 className="mb-3">Specialization</h3>
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
                  <span>Expert in City A and surrounding neighborhoods</span>
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
                    Proficient in handling first-time homebuyers, seasoned
                    investors, and luxury clients
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
                    Strong understanding of local market trends and pricing
                    strategies
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
                    Provides comprehensive property assessments and personalized
                    marketing plans
                  </span>
                </li>
              </ul>

              <h3 className="mb-3">Recent Achievements</h3>
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
                  <span>Closed over $10 million in sales in 2023</span>
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
                    Top Agent Award at Prime Realty for 3 consecutive years
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
                    Successfully negotiated deals for 20+ residential and
                    commercial properties in the past year
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
                  <span>5-star client satisfaction rating</span>
                </li>
              </ul>

              {/* ClientFeedbacks */}
              <ClientFeedbacks />
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
