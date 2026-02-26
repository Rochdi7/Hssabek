"use client";

import { Row, Col, Card } from "react-bootstrap";
import TicketDescription from "./TicketDescription";
import Attachments from "./Attachments";

const TicketDetails = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="py-4 px-0">
          <div className="default-table-area style-two all-projects">
            <div className="table-responsive">
              <table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ticket Title</th>
                    <th scope="col">Requester</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td className="text-body">#854</td>

                    <td>
                      <div className="fw-medium">Network Infrastructure</div>
                    </td>

                    <td className="text-secondary">Walter Frazier</td>

                    <td className="text-secondary">Oliver Clark</td>

                    <td className="text-secondary">20 Apr 2024</td>

                    <td className="text-secondary">30 Apr 2024</td>

                    <td className="text-secondary">High</td>

                    <td>
                      <span className="badge bg-primary bg-opacity-10 text-primary p-2 fs-12 fw-normal">
                        Finished
                      </span>
                    </td>

                    <td>
                      <div className="d-flex align-items-center gap-3">
                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined fs-16 text-body">
                            edit
                          </span>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </Card.Body>
      </Card>

      <Row>
        <Col lg={7} xxl={8}>
          <TicketDescription />
        </Col>

        <Col lg={5} xxl={4}>
          <Attachments />
        </Col>
      </Row>
    </>
  );
};

export default TicketDetails;
