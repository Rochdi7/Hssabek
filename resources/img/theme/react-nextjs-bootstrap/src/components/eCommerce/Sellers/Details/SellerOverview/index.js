"use client";

import { Row, Col, Card } from "react-bootstrap";

const SellerOverview = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4 pb-0">
          <h3 className="mb-lg-4 mb-3">Seller Overview</h3>

          <Row>
            <Col sm={6} xl={6} xxl={3}>
              <Card className="bg-primary bg-opacity-10 border-primary border-opacity-10 rounded-3 mb-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-35">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-primary">
                        settings_account_box
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Total Orders</span>
                      <h3 className="fs-20 mt-1 mb-0">7051</h3>
                    </div>
                  </div>
                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-13">Order this month</span>
                    <span className="count up fw-medium ms-0">+0.75%</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>

            <Col sm={6} xl={6} xxl={3}>
              <Card className="bg-danger bg-opacity-10 border-danger border-opacity-10 rounded-3 mb-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-35">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-danger">
                        settings_timelapse
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Total Earnings</span>
                      <h3 className="fs-20 mt-1 mb-0">$23.91k</h3>
                    </div>
                  </div>
                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-13">Earnings this month</span>
                    <span className="count down fw-medium ms-0">-1.25%</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>

            <Col sm={6} xl={6} xxl={3}>
              <Card className="bg-success bg-opacity-10 border-success border-opacity-10 rounded-3 mb-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-35">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-success">
                        assignment_return
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Total Refunds</span>
                      <h3 className="fs-20 mt-1 mb-0">178</h3>
                    </div>
                  </div>
                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-13">Refunds this month</span>
                    <span className="count up fw-medium ms-0">+4.75%</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>

            <Col sm={6} xl={6} xxl={3}>
              <Card className="bg-primary-div bg-opacity-10 border-primary-div border-opacity-10 rounded-3 mb-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-35">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-primary-div">
                        discover_tune
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Conversion Rate</span>
                      <h3 className="fs-20 mt-1 mb-0">12.21%</h3>
                    </div>
                  </div>
                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-13">Conversion rate this month</span>
                    <span className="count up fw-medium ms-0">+1.11%</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default SellerOverview;
