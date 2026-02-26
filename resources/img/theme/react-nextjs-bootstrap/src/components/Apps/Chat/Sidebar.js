"use client";

import { Card, Form, Tab, Tabs} from "react-bootstrap";
import Image from "next/image"; 

const Sidebar = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-4">
            <h4 className="fw-medium fs-16 mb-0 mb-3">Messages</h4>

            <Form className="position-relative default-src-form">
              <Form.Control
                type="text"
                className="rounded-1"
                placeholder="Search here"
              />
              <span className="material-symbols-outlined fs-18 position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>
          </div>
 
          <Tabs 
            defaultActiveKey="allMessage" 
            className='chat-tabs'
          >
            <Tab
              eventKey="allMessage" title="All Message"
            >
              <div className="max-h-497 pe-2">
                <span className="mb-3 d-block fw-medium fs-12">
                  <i className="ri-pushpin-line fs-14"></i>
                  <span className="ms-1">PINNED</span>
                </span>
                <ul className="ps-0 mb-4 list-unstyled chat-list">
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-48.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">Sarah Smith</h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hello every one. Are you reday for meetig
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">Just Now</span>
                      <span className="fs-12 fw-medium bg-primary text-white rounded-circle wh-16 lh-16 d-inline-block text-center">
                        2
                      </span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom border-color-gray pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-49.jpg"
                          className="wh-48 rounded-circle"
                          alt="user"
                          width={48}
                          height={48}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Michael Johnson
                        </h4>
                        <span className="text-success">Typing...</span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">10:20 AM</span>
                      <i className="ri-check-double-line fs-16 text-primary"></i>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-50.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-warning border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">Sarah Smith</h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Voice message...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">9:30 AM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-51.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          David Martinez
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Excellent work...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">3:20 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-52.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          David Martinez
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Excellent work...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">3:20 PM</span>
                      <span className="fs-12 fw-medium bg-primary text-white rounded-circle wh-16 lh-16 d-inline-block text-center">
                        5
                      </span>
                    </div>
                  </li>
                </ul>
                <span className="mb-3 d-block fw-medium fs-12">
                  <i className="ri-chat-poll-line fs-16"></i>
                  <span className="ms-1">ALL MESSAGE</span>
                </span>
                <ul className="ps-0 mb-0 list-unstyled chat-list">
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-53.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Jessica Taylor
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hello! Mr..
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">12:00 AM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-54.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Christopher Lee
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Very good...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">8:30 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-55.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Amanda Rodriguez
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          That’s cool...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">2:20 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-56.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Daniel Garcia
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Good morning!
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">10:00 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-57.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Jennifer Thomas
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hi John!
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">11:10 AM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-58.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Elizabeth Clark
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Sounds good...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">12:30 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-59.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          William Lewis
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          How are you?
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">11:20 AM</span>
                    </div>
                  </li>
                </ul>
              </div>
            </Tab>

            <Tab
              eventKey="groupChat" title="Group Chat"
            >
              <div className="max-h-497 pe-2">
                <span className="mb-3 d-block fw-medium fs-12">
                  <i className="ri-pushpin-line fs-14"></i>
                  <span className="ms-1">PINNED</span>
                </span>
                <ul className="ps-0 mb-4 list-unstyled chat-list">
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/wordpress.png"
                          className="wh-45 rounded-circle"
                          alt="wordpress"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">Wordpress</h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hello every one. Are you reday for meetig
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">Just Now</span>
                      <span className="fs-12 fw-medium bg-primary text-white rounded-circle wh-16 lh-16 d-inline-block text-center">
                        2
                      </span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom border-color-gray pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/html.png"
                          className="wh-48 rounded-circle"
                          alt="html"
                          width={48}
                          height={48}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1">
                        <h4 className="fs-16 fw-semibold mb-1">HTML</h4>
                        <span className="text-success">Typing...</span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">10:20 AM</span>
                      <i className="ri-check-double-line fs-16 text-primary"></i>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/question-and-answer.png"
                          className="wh-45 rounded-circle"
                          alt="question-and-answer"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-warning border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">QA TEST</h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Voice message...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">9:30 AM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/social-media.png"
                          className="wh-45 rounded-circle"
                          alt="social-media"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Digital Marketing
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Excellent work...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">3:20 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-52.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">Team David</h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Excellent work...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">3:20 PM</span>
                      <span className="fs-12 fw-medium bg-primary text-white rounded-circle wh-16 lh-16 d-inline-block text-center">
                        5
                      </span>
                    </div>
                  </li>
                </ul>
                <span className="mb-3 d-block fw-medium fs-12">
                  <i className="ri-chat-poll-line fs-16"></i>
                  <span className="ms-1">ALL MESSAGE</span>
                </span>
                <ul className="ps-0 mb-0 list-unstyled chat-list">
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-53.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Jessica Taylor
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hello! Mr..
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">12:00 AM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-54.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Christopher Lee
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Very good...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">8:30 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-55.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Amanda Rodriguez
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          That’s cool...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">2:20 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-56.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Daniel Garcia
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Good morning!
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">10:00 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-57.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Jennifer Thomas
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hi John!
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">11:10 AM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-58.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Elizabeth Clark
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Sounds good...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">12:30 PM</span>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-59.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          William Lewis
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          How are you?
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12">11:20 AM</span>
                    </div>
                  </li>
                </ul>
              </div>
            </Tab>

            <Tab
              eventKey="contacts" title="Contacts"
            >
              <div className="max-h-497 pe-2">
                <span className="mb-3 d-block fw-medium fs-12">
                  <i className="ri-pushpin-line fs-14"></i>
                  <span className="ms-1">PINNED</span>
                </span>
                <ul className="ps-0 mb-4 list-unstyled chat-list">
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-48.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">Sarah Smith</h4>
                        <span
                          className="d-inline-block text-truncate text-danger"
                          style={{ maxWidth: '150px' }}
                        >
                          Missed Call
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">Just Now</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom border-color-gray pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-49.jpg"
                          className="wh-48 rounded-circle"
                          alt="user"
                          width={48}
                          height={48}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Michael Johnson
                        </h4>
                        <span className="text-success">Received Call</span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">10:20 AM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-50.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-warning border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">Sarah Smith</h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Voice message...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">9:30 AM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-51.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          David Martinez
                        </h4>
                        <span
                          className="d-inline-block text-truncate text-success"
                          style={{ maxWidth: '150px' }}
                        >
                          Received Call
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">3:20 PM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-52.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          David Martinez
                        </h4>
                        <span
                          className="d-inline-block text-truncate text-success"
                          style={{ maxWidth: '150px' }}
                        >
                          Received Call
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">3:20 PM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                </ul>
                <span className="mb-3 d-block fw-medium fs-12">
                  <i className="ri-chat-poll-line fs-16"></i>
                  <span className="ms-1">ALL MESSAGE</span>
                </span>
                <ul className="ps-0 mb-0 list-unstyled chat-list">
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-53.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Jessica Taylor
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hello! Mr..
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">12:00 AM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-54.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Christopher Lee
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Very good...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">8:30 PM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-55.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Amanda Rodriguez
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          That’s cool...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">2:20 PM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-56.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Daniel Garcia
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Good morning!
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">10:00 PM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-57.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Jennifer Thomas
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Hi John!
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">11:10 AM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-58.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-danger border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          Elizabeth Clark
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          Sounds good...
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">12:30 PM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                  <li className="d-flex justify-content-between align-items-center cursor">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src="/images/user-59.jpg"
                          className="wh-45 rounded-circle"
                          alt="user"
                          width={45}
                          height={45}
                        />
                        <div className="position-absolute p-1 bg-success border border-2 border-white rounded-circle status-position2"></div>
                      </div>
                      <div className="flex-grow-1 ms-2 ps-1 position-relative top-2">
                        <h4 className="fs-16 fw-semibold mb-1">
                          William Lewis
                        </h4>
                        <span
                          className="d-inline-block text-truncate"
                          style={{ maxWidth: '150px' }}
                        >
                          How are you?
                        </span>
                      </div>
                    </div>
                    <div className="text-end">
                      <span className="d-block fs-12 mb-1">11:20 AM</span>
                      <div className="d-flex gap-1 justify-content-between">
                        <i className="ri-phone-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                        <i className="ri-vidicon-fill fs-14 text-primary wh-25 lh-25 bg-primary rounded-1 bg-opacity-10 text-center hover-bg"></i>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </Tab>
          </Tabs>
        </Card.Body>
      </Card>
    </>
  );
};

export default Sidebar;
