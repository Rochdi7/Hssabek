"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const Settings = () => {
  return (
    <>
      <Row>
        <Col lg={8}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <h3 className="mb-lg-4 mb-3">Profile Settings</h3>

              <Form>
                <Row>
                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">First Name</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="Alice"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Last Name</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="Johnson"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Email Address
                      </label>
                      <input
                        type="email"
                        className="form-control h-55"
                        defaultValue="johnson@trezo.com"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Phone Number
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="+1 444 555 6699"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Password</label>
                      <input
                        type="password"
                        className="form-control h-55"
                        placeholder="Enter password"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Confirm Password
                      </label>
                      <input
                        type="password"
                        className="form-control h-55"
                        placeholder="Enter confirm password"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Address</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="E.g. 84 S. Arrowhead Court Branford"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Country</label>
                      <Form.Select
                        className="form-control h-55"
                        aria-label="Default select example"
                      >
                        <option value="0">Switzerland</option>
                        <option value="1">New Zealand</option>
                        <option value="2">Germany</option>
                        <option value="3">United States</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Add Your Bio
                      </label>
                      <textarea
                        rows="6"
                        className="form-control"
                        placeholder="E.g. It makes me feel..."
                      ></textarea>
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Who will be able to see your profile?
                      </label>

                      <div className="d-flex flex-wrap gap-3">
                        <Form.Check
                          inline
                          label="Only me"
                          name="group2"
                          type="radio"
                          id="inline-radio-1"
                        />

                        <Form.Check
                          inline
                          label="My followers"
                          name="group2"
                          type="radio"
                          id="inline-radio-2"
                        />

                        <Form.Check
                          inline
                          label="Everyone"
                          name="group2"
                          type="radio"
                          id="inline-radio-3"
                        />
                      </div>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Your Skills
                      </label>
                      <Form.Select
                        className="form-control h-55"
                        aria-label="Default select example"
                      >
                        <option value="0">Leadership</option>
                        <option value="1">Data Analysis</option>
                        <option value="2">Project Management</option>
                        <option value="3">Teamwork</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Your Profession
                      </label>
                      <Form.Select
                        className="form-control h-55"
                        aria-label="Default select example"
                      >
                        <option value="0">Financial Manager</option>
                        <option value="1">IT Manager</option>
                        <option value="2">Software Developer</option>
                        <option value="3">Physician Assistant</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Company Name
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="Trezo Admin"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Company Website
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="http://website.com"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Facebook</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="https://www.facebook.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">X</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="https://x.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Linkedin</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="https://www.linkedin.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">YouTube</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="https://www.youtube.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Profile Picture
                      </label>
                      <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
                        <div className="product-upload">
                          <label
                            htmlFor="file-upload"
                            className="file-upload mb-0"
                          >
                            <i className="ri-folder-image-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>
                            <span className="d-block text-body fs-14">
                              Drag and drop an image or{" "}
                              <span className="text-primary text-decoration-underline">
                                Browse
                              </span>
                            </span>
                          </label>
                          <input id="file-upload" type="file" />
                        </div>
                      </div>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Cover Photo
                      </label>
                      <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
                        <div className="product-upload">
                          <label
                            htmlFor="file-upload"
                            className="file-upload mb-0"
                          >
                            <i className="ri-file-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>
                            <span className="d-block text-body fs-14">
                              Drag and drop a file or{" "}
                              <span className="text-primary text-decoration-underline">
                                Browse
                              </span>
                            </span>
                          </label>
                          <input id="file-upload" type="file" />
                        </div>
                      </div>
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <div className="d-flex flex-wrap gap-3">
                      <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
                        Cancel
                      </button>
                      <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
                        {" "}
                        <i className="ri-add-line text-white fw-medium"></i>{" "}
                        Save Information
                      </button>
                    </div>
                  </Col>
                </Row>
              </Form>
            </Card.Body>
          </Card>
        </Col>

        <Col lg={4}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <h3 className="mb-lg-4 mb-3">Privacy Policy</h3>

              <div className="mb-4">
                <div className="form-check mb-3">
                  <input
                    className="form-check-input"
                    type="checkbox"
                    defaultValue=""
                    id="flexCheckDefault"
                  />
                  <label
                    className="form-check-label"
                    htmlFor="flexCheckDefault"
                  >
                    Allow users to show your email
                  </label>
                </div>

                <div className="form-check mb-3">
                  <input
                    className="form-check-input"
                    type="checkbox"
                    defaultValue=""
                    id="flexCheckChecked2"
                  />
                  <label
                    className="form-check-label"
                    htmlFor="flexCheckChecked2"
                  >
                    Allow users to show your experiences
                  </label>
                </div>

                <div className="form-check mb-0">
                  <input
                    className="form-check-input"
                    type="checkbox"
                    defaultValue=""
                    id="flexCheckChecked3"
                  />
                  <label
                    className="form-check-label"
                    htmlFor="flexCheckChecked3"
                  >
                    Allow users to show your followers
                  </label>
                </div>
              </div>

              <div className="mb-4">
                <label className="label text-secondary">Who can tag you?</label>
                <div className="d-flex flex-wrap gap-3">
                  <Form.Check
                    inline
                    label="Everyone"
                    name="group3"
                    type="radio"
                    id="inline-radio-4"
                  />

                  <Form.Check
                    inline
                    label="Group Member"
                    name="group3"
                    type="radio"
                    id="inline-radio-5"
                  />
                </div>
              </div>

              <div className="mb-4">
                <label className="label text-secondary">
                  Account Deletion Or Transfer
                </label>
                <p>
                  Transfer this account to another person or to a company
                  repositories.
                </p>
              </div>

              <div className="d-flex flex-wrap gap-3">
                <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
                  Delete Account
                </button>
                <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
                  {" "}
                  <i className="ri-arrow-left-right-line text-white fw-medium"></i>{" "}
                  Transfer Account
                </button>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default Settings;
