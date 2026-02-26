"use client";

import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";

const ProjectsOverview = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div>
            <h3 className="mb-0">Projects Overview</h3>
          </div>

          <Row>
            <Col xs={12} sm={6} xl={6}>
              <Card className="bg-primary bg-opacity-10 border-primary border-opacity-10 rounded-3 mt-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-19">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-primary">
                        folder_open
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Total Projects</span>
                      <h3 className="fs-20 mt-1 mb-0">1235</h3>
                    </div>
                  </div>
                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-12">Projects this month</span>
                    <span className="count up fw-medium ms-0">+10%</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>

            <Col xs={12} sm={6} xl={6}>
              <Card className="bg-danger bg-opacity-10 border-danger border-opacity-10 rounded-3 mt-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-19">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-danger">
                        stacks
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Active Projects</span>
                      <h3 className="fs-20 mt-1 mb-0">425</h3>
                    </div>
                  </div>
                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-12">Projects this month</span>
                    <span className="count up fw-medium ms-0">+5.75%</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>

            <Col xs={12} sm={6} xl={6}>
              <Card className="bg-success bg-opacity-10 border-success border-opacity-10 rounded-3 mt-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-19">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-success">
                        assignment_turned_in
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Finished Projects</span>
                      <h3 className="fs-20 mt-1 mb-0">135</h3>
                    </div>
                  </div>
                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-12">Projects this month</span>
                    <span className="count down fw-medium ms-0">-15%</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>

            <Col xs={12} sm={6} xl={6}>
              <Card className="bg-primary-div bg-opacity-10 border-primary-div border-opacity-10 rounded-3 mt-4 stats-box style-three">
                <Card.Body className="p-4">
                  <div className="d-flex align-items-center mb-2">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-40 text-primary-div">
                        group
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <span>Team Members</span>
                      <h3 className="fs-20 mt-1 mb-0">65+</h3>
                    </div>
                  </div>

                  <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    <span className="fs-12">Hard Worker</span>
                    <ul className="ps-0 mb-0 list-unstyled d-flex align-items-center">
                      <li>
                        <Image
                          src="/images/user-16.jpg"
                          className="wh-34 lh-34 rounded-circle border border-1 border-color-white"
                          alt="user"
                          width={34}
                          height={34}
                        />
                      </li>
                      <li className="ms-m-15">
                        <Image
                          src="/images/user-17.jpg"
                          className="wh-34 lh-34 rounded-circle border border-1 border-color-white"
                          alt="user"
                          width={34}
                          height={34}
                        />
                      </li>
                      <li className="ms-m-15">
                        <Image
                          src="/images/user-18.jpg"
                          className="wh-34 lh-34 rounded-circle border border-1 border-color-white"
                          alt="user"
                          width={34}
                          height={34}
                        />
                      </li>
                      <li className="ms-m-15">
                        <Image
                          src="/images/user-19.jpg"
                          className="wh-34 lh-34 rounded-circle border border-1 border-color-white"
                          alt="user"
                          width={34}
                          height={34}
                        />
                      </li>
                      <li className="ms-m-15">
                        <div className="wh-34 lh-34 rounded-circle bg-primary d-block text-center text-decoration-none text-white fs-12 fw-medium border border-1 border-color-white">
                          +55
                        </div>
                      </li>
                    </ul>
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

export default ProjectsOverview;
