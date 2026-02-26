"use client";

import { Row, Col, Dropdown, Card, Form } from "react-bootstrap";

const Assets = () => {
  return (
    <>
      <Row className="justify-content-center">
        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-primary">
                  folder_open
                </span>

                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Projects
                </span>
              </div>

              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-primary-div">
                  folder_open
                </span>

                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Documents
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-success">
                  folder_open
                </span>

                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Media
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-danger">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Applications
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-warning">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  ET Template
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-info">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  React Template
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-primary-div">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Material UI
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-secondary">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  WP Themes
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-danger">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Personal Photos
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-primary">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Mobile Apps
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-primary-div">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Important Files
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={6} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between">
                <Form>
                  <Form.Check type="checkbox" id="default-checkbox" label="" />
                </Form>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined fs-25">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">
                        border_color
                      </span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center py-4 my-3">
                <span className="material-symbols-outlined fs-45 text-warning">
                  folder_open
                </span>
                <span className="fs-15 fw-bold text-secondary ms-2 position-relative top-2">
                  Angular Template
                </span>
              </div>
              <div className="d-flex justify-content-between">
                <span className="fs-13 text-secondary">159 Files</span>
                <span className="fs-13 text-secondary">4.5 GB</span>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default Assets;
