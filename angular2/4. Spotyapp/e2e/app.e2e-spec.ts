import { SpotyappPage } from './app.po';

describe('spotyapp App', () => {
  let page: SpotyappPage;

  beforeEach(() => {
    page = new SpotyappPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!!');
  });
});
