"use client";

import {
  Row,
  Col,
  Dropdown,
  Card,
  Form,
  OverlayTrigger,
  Tooltip,
} from "react-bootstrap";

const Compose = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap border-bottom pb-3 mb-4">
            <h3 className="fs-16 fw-semibold mb-0">New Message</h3>

            <div className="d-flex position-relative top-3">
              <OverlayTrigger
                placement="top"
                overlay={<Tooltip id="tooltip-top">Archive</Tooltip>}
              >
                <button className="pe-0 border-0 bg-transparent ps-2">
                  <span className="material-symbols-outlined fs-20 text-body hover">
                    archive
                  </span>
                </button>
              </OverlayTrigger>

              <OverlayTrigger
                placement="top"
                overlay={<Tooltip id="tooltip-top">Help</Tooltip>}
              >
                <button className="pe-0 border-0 bg-transparent ms-2">
                  <span className="material-symbols-outlined fs-20 text-body hover">
                    help_clinic
                  </span>
                </button>
              </OverlayTrigger>

              <OverlayTrigger
                placement="top"
                overlay={<Tooltip id="tooltip-top">Tresh</Tooltip>}
              >
                <button className="pe-0 border-0 bg-transparent ms-2">
                  <span className="material-symbols-outlined fs-20 text-body hover">
                    delete
                  </span>
                </button>
              </OverlayTrigger>

              <OverlayTrigger
                placement="top"
                overlay={<Tooltip id="tooltip-top">More Option</Tooltip>}
              >
                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="p-0 border-0 bg-transparent"
                  >
                    <i className="material-symbols-outlined">more_vert</i>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View Profile
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete Chat
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">lock</i>
                      Block
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </OverlayTrigger>
            </div>
          </div>

          {/* form */}
          <Form>
            <Row>
              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary fs-14">
                    To
                  </Form.Label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option defaultValue="0">Select</option>
                    <option defaultValue="1">james@trezo.com</option>
                    <option defaultValue="2">andy@trezo.com</option>
                    <option defaultValue="3">mateo@trezo.com</option>
                    <option defaultValue="4">luca@trezo.com</option>
                    <option defaultValue="5">luca@trezo.com</option>
                    <option defaultValue="6">tomato@trezo.com</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary fs-14">
                    Cc
                  </Form.Label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option defaultValue="0">Select</option>
                    <option defaultValue="1">james@trezo.com</option>
                    <option defaultValue="2">andy@trezo.com</option>
                    <option defaultValue="3">mateo@trezo.com</option>
                    <option defaultValue="4">luca@trezo.com</option>
                    <option defaultValue="5">luca@trezo.com</option>
                    <option defaultValue="6">tomato@trezo.com</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary fs-14">
                    Bcc
                  </Form.Label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option defaultValue="0">Select</option>
                    <option defaultValue="1">james@trezo.com</option>
                    <option defaultValue="2">andy@trezo.com</option>
                    <option defaultValue="3">mateo@trezo.com</option>
                    <option defaultValue="4">luca@trezo.com</option>
                    <option defaultValue="5">luca@trezo.com</option>
                    <option defaultValue="6">tomato@trezo.com</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary fs-14">
                    Subject
                  </Form.Label>
                  <input
                    type="text"
                    className="form-control h-55"
                    placeholder="Write your subject..."
                  />
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary fs-14">
                    Description
                  </Form.Label>
 
                  <Form.Control as="textarea" rows={8} placeholder="Type description here..." /> 
                </Form.Group>
              </Col>

              <Col lg={12}>
                <div className="d-flex flex-wrap gap-3 align-items-center">
                  <button
                    className="btn btn-primary text-white fw-semibold py-2 px-4 me-4"
                    type="submit"
                  >
                    Send
                  </button>

                  <div className="position-relative top-3 d-flex align-items-baseline flex-wrap gap-sm-0">
                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">Text</Tooltip>}
                    >
                      <button className="p-0 border-0 bg-transparent">
                        <span className="material-symbols-outlined fs-20 text-body hover">
                          text_fields_alt
                        </span>
                      </button>
                    </OverlayTrigger>

                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">File</Tooltip>}
                    >
                      <button className="p-0 border-0 bg-transparent ms-3">
                        <span className="material-symbols-outlined fs-20 text-body hover">
                          attach_file
                        </span>
                      </button>
                    </OverlayTrigger>

                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">Link</Tooltip>}
                    >
                      <button className="p-0 border-0 bg-transparent ms-3">
                        <span className="material-symbols-outlined fs-20 text-body hover">
                          link
                        </span>
                      </button>
                    </OverlayTrigger>

                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">Mood</Tooltip>}
                    >
                      <button className="p-0 border-0 bg-transparent ms-3">
                        <span className="material-symbols-outlined fs-20 text-body hover">
                          mood
                        </span>
                      </button>
                    </OverlayTrigger>

                    <button
                      className="p-0 border-0 bg-transparent ms-3"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      data-bs-title="Drive"
                    >
                      <span className="material-symbols-outlined fs-20 text-body hover">
                        add_to_drive
                      </span>
                    </button>

                    <button
                      className="p-0 border-0 bg-transparent ms-3"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      data-bs-title="Pen"
                    >
                      <span className="material-symbols-outlined fs-20 text-body hover">
                        ink_pen
                      </span>
                    </button>

                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">More Option</Tooltip>}
                    >
                      <Dropdown className="action-opt ms-3 position-relative">
                        <Dropdown.Toggle
                          variant="secondary"
                          id="dropdown-basic"
                          className="p-0 border-0 bg-transparent"
                        >
                          <i className="material-symbols-outlined">more_vert</i>
                        </Dropdown.Toggle>

                        <Dropdown.Menu className="bg-white border box-shadow">
                          <Dropdown.Item href="#">
                            <i className="material-symbols-outlined">
                              visibility
                            </i>
                            View Profile
                          </Dropdown.Item>

                          <Dropdown.Item href="#">
                            <i className="material-symbols-outlined">delete</i>
                            Delete Chat
                          </Dropdown.Item>

                          <Dropdown.Item href="#">
                            <i className="material-symbols-outlined">lock</i>
                            Block
                          </Dropdown.Item>
                        </Dropdown.Menu>
                      </Dropdown>
                    </OverlayTrigger>
                  </div>
                </div>
              </Col>
            </Row>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default Compose;
