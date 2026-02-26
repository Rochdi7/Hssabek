"use client";

import {
  Row,
  Col,
  Dropdown,
  Card,
  Form,
  Button,
  OverlayTrigger,
  Tooltip,
} from "react-bootstrap";
import Image from "next/image";
import Sidebar from "./Sidebar";

const ChatContent = () => {
  return (
    <>
      <Row className="justify-content-center">
        <Col xs={12} md={5} lg={5} xl={5} xxl={4}>
          <Sidebar />
        </Col>

        <Col xs={12} md={7} lg={7} xl={7} xxl={8}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center flex-wrap ga-2 border-bottom pb-4 mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0 position-relative">
                    <Image
                      src="/images/user-49.jpg"
                      className="wh-52 rounded-circle"
                      alt="user"
                      width={52}
                      height={52}
                    />
                    <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                  </div>
                  <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Michael Johnson</h4>
                    <span>Active now</span>
                  </div>
                </div>

                <ul className="ps-0 mb-0 list-unstyled chat-call-option d-flex gap-1 gap-xl-3">
                  <li>
                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">Audio Call</Tooltip>}
                    >
                      <button className="p-0 border-0 bg-transparent">
                        <i className="ri-phone-line fs-16 text-body hover"></i>
                      </button>
                    </OverlayTrigger>
                  </li>

                  <li>
                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">Video Call</Tooltip>}
                    >
                      <button className="p-0 border-0 bg-transparent">
                        <i className="ri-vidicon-fill fs-16 text-body hover"></i>
                      </button>
                    </OverlayTrigger>
                  </li>

                  <li>
                    <OverlayTrigger
                      placement="top"
                      overlay={<Tooltip id="tooltip-top">More Option</Tooltip>}
                    >
                      <Dropdown className="action-opt">
                        <Dropdown.Toggle
                          variant="secondary"
                          id="dropdown-basic"
                          className="bg-transparent p-0"
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
                  </li>
                </ul>
              </div>

              <span className="d-block fs-12 mb-2">2023-11-10 09:15 AM</span>

              <ul
                className="mb-0 list-unstyled chat-details max-h-419 pe-2"
                data-simplebar
              >
                <li className="mb-4">
                  <div className="d-sm-flex">
                    <div className="flex-shrink-0">
                      <Image
                        src="/images/user-49.jpg"
                        className="wh-48 rounded-circle"
                        alt="user"
                        width={48}
                        height={48}
                      />
                    </div>
                    <div className="flex-grow-1 ms-sm-3 mt-3 mt-sm-0">
                      <div className="d-flex align-items-center">
                        <p>
                          Hey Micheals, have you had a chance to check out the
                          new admin dashboard?
                        </p>

                        <Dropdown className="action-opt ms-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>
                      </div>
                      <span className="fs-12 d-block">19:04 PM</span>
                    </div>
                  </div>
                </li>

                <li className="mb-4 ms-auto own-chat">
                  <div className="d-sm-flex text-end">
                    <div className="flex-grow-1 mb-3 mb-sm-0">
                      <div className="d-flex align-items-center justify-content-end">
                        <Dropdown className="action-opt m2-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>

                        <p>Oh, you mean the one for project management?</p>
                      </div>
                      <span className="fs-12 d-block">09:20 AM</span>
                    </div>
                  </div>
                </li>

                <li className="mb-4">
                  <div className="d-sm-flex">
                    <div className="flex-shrink-0">
                      <Image
                        src="/images/user-49.jpg"
                        className="wh-48 rounded-circle"
                        alt="user"
                        width={48}
                        height={48}
                      />
                    </div>
                    <div className="flex-grow-1 ms-sm-3 mt-3 mt-sm-0">
                      <div className="d-flex align-items-center">
                        <p>
                          Yeah, that&apos;s the one! It&apos;s got a sleek
                          Material Design, and the features are pretty robust.
                        </p>

                        <Dropdown className="action-opt ms-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>
                      </div>
                      <span className="fs-12 d-block">09:20 AM</span>
                    </div>
                  </div>
                </li>

                <li className="mb-4 ms-auto own-chat">
                  <div className="d-sm-flex text-end">
                    <div className="flex-grow-1 mb-3 mb-sm-0">
                      <div className="d-flex align-items-center justify-content-end">
                        <Dropdown className="action-opt me-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>

                        <p>Nice! What features are you finding interesting?</p>
                      </div>
                      <span className="fs-12 d-block">09:21 AM</span>
                    </div>
                  </div>
                </li>

                <li className="mb-4">
                  <div className="d-sm-flex">
                    <div className="flex-shrink-0">
                      <Image
                        src="/images/user-49.jpg"
                        className="wh-48 rounded-circle"
                        alt="user"
                        width={48}
                        height={48}
                      />
                    </div>
                    <div className="flex-grow-1 ms-sm-3 mt-3 mt-sm-0">
                      <div className="d-flex align-items-center">
                        <p>
                          Well, it has a project overview with all the key
                          metrics on the landing page – project
                        </p>

                        <Dropdown className="action-opt ms-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>
                      </div>
                      <span className="fs-12 d-block">09:22 AM</span>
                    </div>
                  </div>
                </li>

                <li className="mb-4 ms-auto own-chat">
                  <div className="d-sm-flex text-end">
                    <div className="flex-grow-1 mb-3 mb-sm-0">
                      <div className="d-flex align-items-center justify-content-end">
                        <Dropdown className="action-opt me-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>

                        <p>
                          That sounds handy. How about the task management
                          features?
                        </p>
                      </div>
                      <span className="fs-12 d-block">09:21 AM</span>
                    </div>
                  </div>
                </li>

                <li className="mb-4">
                  <div className="d-sm-flex">
                    <div className="flex-shrink-0">
                      <Image
                        src="/images/user-49.jpg"
                        className="wh-48 rounded-circle"
                        alt="user"
                        width={48}
                        height={48}
                      />
                    </div>
                    <div className="flex-grow-1 ms-sm-3 mt-3 mt-sm-0">
                      <div className="d-flex align-items-center">
                        <p>
                          Oh, they&apos;ve got this Kanban board for task
                          management. You can drag and drop tasks between
                          columns – it&apos;s so intuitive.
                        </p>

                        <Dropdown className="action-opt ms-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>
                      </div>
                      <span className="fs-12 d-block">09:30 AM</span>
                    </div>
                  </div>
                </li>

                <li className="mb-4 ms-auto own-chat">
                  <div className="d-sm-flex text-end">
                    <div className="flex-grow-1 mb-3 mb-sm-0">
                      <div className="d-flex align-items-center justify-content-end">
                        <Dropdown className="action-opt me-2">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0"
                          >
                            <i className="ri-more-2-fill text-secondary"></i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                refresh
                              </i>
                              Reply
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete You
                            </Dropdown.Item>

                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete Everyone
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>

                        <p>Sweet! What about team collaboration?</p>
                      </div>
                      <span className="fs-12 d-block">09:31AM</span>
                    </div>
                  </div>
                </li>
              </ul>

              <div className="d-sm-flex justify-content-between align-items-center bg-gary-light for-dark rounded-3 p-4">
                <div className="d-flex gap-3 justify-content-center justify-content-sm-start">
                  <OverlayTrigger
                    placement="top"
                    overlay={<Tooltip id="tooltip-top">Emoji</Tooltip>}
                  >
                    <button className="p-0 border-0 bg-transparent">
                      <i className="ri-emotion-laugh-line fs-18 text-body"></i>
                    </button>
                  </OverlayTrigger>

                  <OverlayTrigger
                    placement="top"
                    overlay={<Tooltip id="tooltip-top">Link</Tooltip>}
                  >
                    <button className="p-0 border-0 bg-transparent">
                      <i className="ri-link-m fs-18 text-body"></i>
                    </button>
                  </OverlayTrigger>

                  <OverlayTrigger
                    placement="top"
                    overlay={<Tooltip id="tooltip-top">Voice</Tooltip>}
                  >
                    <button className="p-0 border-0 bg-transparent">
                      <i className="ri-mic-line fs-18 text-body"></i>
                    </button>
                  </OverlayTrigger>

                  <OverlayTrigger
                    placement="top"
                    overlay={<Tooltip id="tooltip-top">Image</Tooltip>}
                  >
                    <button className="p-0 border-0 bg-transparent">
                      <i className="ri-image-line fs-18 text-body"></i>
                    </button>
                  </OverlayTrigger>
                </div>

                <Form className="w-100 ps-sm-4 ps-xxl-4 ms-xxl-3 mt-3 mt-sm-0 position-relative">
                  <Form.Control
                    type="text"
                    className="rounded-1 border-0 text-dark h-55"
                    placeholder="Type your message"
                  />
                  <Button
                    variant="primary"
                    className="p-0 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y pe-3 d-sm-none"
                  >
                    <span className="material-symbols-outlined fs-24 text-primary">
                      send
                    </span>
                  </Button>
                </Form>

                <Button
                  variant="primary"
                  className="p-0 border-0 bg-primary d-none d-sm-block rounded-1 ms-3"
                >
                  <span className="material-symbols-outlined text-white wh-55 lh-55 d-inline-block">
                    send
                  </span>
                </Button>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default ChatContent;
