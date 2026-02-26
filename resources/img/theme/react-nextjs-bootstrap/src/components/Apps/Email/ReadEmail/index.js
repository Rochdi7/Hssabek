"use client";

import { Dropdown, Card, OverlayTrigger, Tooltip} from "react-bootstrap";
import Image from "next/image";

const ReadEmail = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap border-bottom pb-3 mb-4">
            <h3 className="fs-16 fw-semibold mb-0">Sales Review Meeting</h3>

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
                    <i className="material-symbols-outlined">
	more_vert
</i>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">
	visibility
</i>
                      View All
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">
	delete
</i>
                      Delete One
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">
	lock
</i>
                      Block
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </OverlayTrigger>
            </div>
          </div>

          <div className="d-flex justify-content-between align-items-center mb-4 pb-md-3">
            <div className="d-flex align-items-center">
              <div className="flex-shrink-0">
                <Image
                  src="/images/user-48.jpg"
                  className="wh-45 rounded-circle"
                  alt="user"
                  width={45}
                  height={45}
                />
              </div>
              <div className="flex-grow-1 ms-3 position-relative top-2">
                <h4 className="mb-0 fs-14 fw-semibold">Sarah Smith</h4>
                <span>sarah@gmail.com</span>
              </div>
            </div>
            <span>
              <i className="ri-star-line fs-18 text-body me-1"></i> 26
              March,2024
            </span>
          </div>

          <div className="ps-sm-5 ms-sm-2">
            <h5 className="fs-14 fw-semibold mb-3 mb-md-4">
              Subject: Re: Quarterly Sales Review Meeting
            </h5>

            <span className="fw-medium text-secondary d-block mb-4">
              Hi Smith,
            </span>

            <p>
              Great, I&apos;ll go ahead and send out the calendar invite
              shortly.
            </p>

            <p>
              Regarding the agenda, I think your suggestions are spot on.
              I&apos;ll add them to the agenda and circulate it to everyone
              before the meeting so they can come prepared.
            </p>

            <p>
              Additionally, I think it would be beneficial to have a brief
              update on any new products or promotions that are launching in the
              next quarter. This will give us a comprehensive view of our sales
              strategy moving forward.
            </p>

            <p>
              Let me know if you think that&apos;s a valuable addition to the
              agenda.
            </p>

            <div className="border-bottom pb-4 mb-4 mt-4 mt-md-5">
              <h5 className="fs-14 fw-medium mb-2">Best regards,</h5>
              <h5 className="fs-14 fw-medium mb-0">Olivia Parker</h5>
            </div>

            <div className="d-flex flex-wrap gap-3">
              <button className="btn btn-primary fs-16 fw-medium px-3">
                Reply
              </button>
              <button className="btn btn-outline-primary fs-16 fw-medium px-3">
                Forward
              </button>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ReadEmail;
